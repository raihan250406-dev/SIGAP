<?php

namespace App\Exports;

use App\Models\WajibPajak;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class WajibPajakExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $tanggalMulai;
    protected $tanggalSelesai;
    protected $labelPeriode;

    public function __construct($tanggalMulai = null, $tanggalSelesai = null, $labelPeriode = null)
    {
        $this->tanggalMulai = $tanggalMulai;
        $this->tanggalSelesai = $tanggalSelesai;
        $this->labelPeriode = $labelPeriode;
    }

    public function collection()
    {
        $query = WajibPajak::query();

        // Filter tanggal berdasarkan waktu penetapan (created_at)
        if ($this->tanggalMulai && $this->tanggalSelesai) {
            $query->whereBetween('created_at', [
                Carbon::parse($this->tanggalMulai)->startOfDay(),
                Carbon::parse($this->tanggalSelesai)->endOfDay()
            ]);
        } elseif ($this->tanggalMulai) {
            $query->whereDate('created_at', '>=', $this->tanggalMulai);
        } elseif ($this->tanggalSelesai) {
            $query->whereDate('created_at', '<=', $this->tanggalSelesai);
        }

        return $query->orderBy('id', 'asc')->get();
    }

    public function headings(): array
    {
        // Tentukan teks periode secara dinamis
        if ($this->labelPeriode) {
            $teksPeriode = 'Periode: ' . $this->labelPeriode;
        } elseif ($this->tanggalMulai && $this->tanggalSelesai) {
            $tglAwal = Carbon::parse($this->tanggalMulai)->translatedFormat('d F Y');
            $tglAkhir = Carbon::parse($this->tanggalSelesai)->translatedFormat('d F Y');
            $teksPeriode = "Periode: {$tglAwal} - {$tglAkhir}";
        } else {
            $teksPeriode = 'Periode: Semua Data Terdaftar';
        }

        return [
            // Baris 1: Judul Laporan
            ['LAPORAN DATA WAJIB PAJAK - SIGAP'],
            // Baris 2: Subjudul Periode Dinamis
            [$teksPeriode],
            // Baris 3: Spasi kosong
            [],
            // Baris 4: Header Tabel
            [
                'NO. ANTREAN',
                'NOPOL',
                'NAMA WAJIB PAJAK',
                'NO. HP',
                'JENIS PENDAFTARAN',
                'FUNGSI',
                'TANGGAL JATUH TEMPO',
                'TITIK LAYANAN',
                'TANGGAL PENETAPAN',
                'JAM PENETAPAN',
                'STATUS',
            ]
        ];
    }

    public function map($wajibPajak): array
    {
        $tglJatuhTempo = $wajibPajak->tanggal_jatuh_tempo 
            ? Carbon::parse($wajibPajak->tanggal_jatuh_tempo)->format('Y-m-d')
            : '-';

        $tglPenetapan = $wajibPajak->created_at 
            ? Carbon::parse($wajibPajak->created_at)->format('Y-m-d')
            : '-';

        $jamPenetapan = $wajibPajak->created_at 
            ? Carbon::parse($wajibPajak->created_at)->format('H:i:s')
            : '-';

        return [
            $wajibPajak->no_antrian,
            $wajibPajak->nopol,
            $wajibPajak->nama,
            $wajibPajak->no_hp ?? '-',
            $wajibPajak->jenis_pendaftaran,
            $wajibPajak->fungsi ?? '-',
            $tglJatuhTempo,
            $wajibPajak->titik_layanan,
            $tglPenetapan,
            $jamPenetapan,
            $wajibPajak->status,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();

        // 1. Merge & Style Judul Atas
        $sheet->mergeCells('A1:K1');
        $sheet->mergeCells('A2:K2');

        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 16,
                'name' => 'Segoe UI',
                'color' => ['rgb' => '0F172A'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->getStyle('A2')->applyFromArray([
            'font' => [
                'italic' => true,
                'bold' => true,
                'size' => 10,
                'name' => 'Segoe UI',
                'color' => ['rgb' => '64748B'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->getRowDimension(1)->setRowHeight(35);
        $sheet->getRowDimension(2)->setRowHeight(18);

        // 2. Styling Header Tabel (Baris 4)
        $sheet->getStyle('A4:K4')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 10,
                'name' => 'Segoe UI',
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '1E293B'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->getRowDimension(4)->setRowHeight(28);

        // 3. Styling Baris Data
        if ($highestRow >= 5) {
            $sheet->getStyle("A5:K{$highestRow}")->applyFromArray([
                'font' => [
                    'name' => 'Segoe UI',
                    'size' => 10,
                ],
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ]);

            // Alignment Rata Tengah
            $sheet->getStyle("A5:A{$highestRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("B5:B{$highestRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("E5:E{$highestRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("G5:K{$highestRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            // Border
            $sheet->getStyle("A4:K{$highestRow}")->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => 'CBD5E1'],
                    ],
                ],
            ]);

            // Badge Warna Status (MS / TMS)
            for ($row = 5; $row <= $highestRow; $row++) {
                $sheet->getRowDimension($row)->setRowHeight(22);
                $status = $sheet->getCell("K{$row}")->getValue();

                if ($status === 'MS') {
                    $sheet->getStyle("K{$row}")->applyFromArray([
                        'font' => ['color' => ['rgb' => '15803D'], 'bold' => true],
                        'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'DCFCE7']],
                    ]);
                } elseif ($status === 'TMS') {
                    $sheet->getStyle("K{$row}")->applyFromArray([
                        'font' => ['color' => ['rgb' => 'B91C1C'], 'bold' => true],
                        'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FEE2E2']],
                    ]);
                }
            }
        }

        return [];
    }
}