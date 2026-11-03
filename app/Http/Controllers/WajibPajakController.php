<?php

namespace App\Http\Controllers;

use App\Models\WajibPajak;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class WajibPajakController extends Controller
{
    /**
     * Menampilkan dashboard PAJAKIN.
     */
    public function index()
    {
        $wajibPajaks = WajibPajak::orderBy('id', 'desc')->get();

        return view('pajakin.index', compact('wajibPajaks'));
    }

    /**
     * Menyimpan data wajib pajak baru.
     * Nomor antrean dibuat otomatis oleh sistem.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nopol' => 'required|string|max:20|unique:wajib_pajaks,nopol',
            'nama' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',

            'jenis_pendaftaran' => [
                'required',
                Rule::in([
                    'PU TAHUNAN',
                    'PU 5 TAHUNAN',
                    'MUTASI MASUK',
                    'DUPLIKAT PAJAK',
                ]),
            ],

            'jalur_antrian' => [
                'nullable',
                'required_if:jenis_pendaftaran,PU TAHUNAN',
                Rule::in(['A', 'B']),
            ],

            'tanggal_jatuh_tempo' => 'required|date',
            'fungsi' => 'nullable|string|max:100',
            'titik_layanan' => 'required|string|max:255',

            'foto_stnk' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'foto_ktp'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Format nomor polisi menjadi huruf kapital.
        $validated['nopol'] = strtoupper(trim($validated['nopol']));

        // Status dihitung otomatis berdasarkan tanggal jatuh tempo.
        $validated['status'] = $this->hitungStatus(
            $validated['tanggal_jatuh_tempo']
        );

        // PU TAHUNAN bisa memilih A atau B.
        // Jenis lainnya otomatis masuk antrean A.
        $jalur = $validated['jenis_pendaftaran'] === 'PU TAHUNAN'
            ? $validated['jalur_antrian']
            : 'A';

        unset($validated['jalur_antrian']);

        // Simpan foto STNK.
        if ($request->hasFile('foto_stnk')) {
            $validated['foto_stnk'] = $request->file('foto_stnk')
                ->store('stnk', 'public');
        }

        // Simpan foto KTP.
        if ($request->hasFile('foto_ktp')) {
            $validated['foto_ktp'] = $request->file('foto_ktp')
                ->store('ktp', 'public');
        }

        // Buat nomor antrean secara aman dalam transaksi database.
        try {
            DB::transaction(function () use ($validated, $jalur) {

                $counter = DB::table('queue_counters')
                    ->where('kode', $jalur)
                    ->lockForUpdate()
                    ->first();

                if (!$counter) {
                    throw new \RuntimeException(
                        'Penghitung antrean ' . $jalur . ' tidak ditemukan. Jalankan migration terlebih dahulu.'
                    );
                }

                $nomorBaru = $counter->nomor_terakhir + 1;

                DB::table('queue_counters')
                    ->where('kode', $jalur)
                    ->update([
                        'nomor_terakhir' => $nomorBaru,
                        'updated_at' => now(),
                    ]);

                // Format nomor: A-001, A-002, B-001.
                $validated['no_antrian'] = $jalur . '-' . str_pad(
                    $nomorBaru,
                    3,
                    '0',
                    STR_PAD_LEFT
                );

                WajibPajak::create($validated);
            });

        } catch (\Throwable $e) {

            // Bersihkan foto jika penyimpanan database gagal.
            if (!empty($validated['foto_stnk'])) {
                Storage::disk('public')->delete($validated['foto_stnk']);
            }
            if (!empty($validated['foto_ktp'])) {
                Storage::disk('public')->delete($validated['foto_ktp']);
            }

            throw $e;
        }

        return redirect()
            ->route('pajakin.index')
            ->with('success', 'Data wajib pajak berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit.
     */
    public function edit(WajibPajak $wajibPajak)
    {
        return view('pajakin.edit', compact('wajibPajak'));
    }

    /**
     * Memperbarui data wajib pajak.
     * Nomor antrean tidak berubah ketika data diedit.
     */
    public function update(Request $request, WajibPajak $wajibPajak)
    {
        $validated = $request->validate([
            'nopol' => [
                'required',
                'string',
                'max:20',
                Rule::unique('wajib_pajaks', 'nopol')
                    ->ignore($wajibPajak->id),
            ],

            'nama' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'tanggal_jatuh_tempo' => 'required|date',
            'fungsi' => 'nullable|string|max:100',
            'titik_layanan' => 'required|string|max:255',

            'foto_stnk' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'foto_ktp'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Format nomor polisi menjadi huruf kapital.
        $validated['nopol'] = strtoupper(trim($validated['nopol']));

        // Hitung ulang status berdasarkan tanggal jatuh tempo.
        $validated['status'] = $this->hitungStatus(
            $validated['tanggal_jatuh_tempo']
        );

        // Ganti foto STNK lama jika ada foto baru.
        if ($request->hasFile('foto_stnk')) {

            $fotoStnkLama = $wajibPajak->foto_stnk;

            $validated['foto_stnk'] = $request->file('foto_stnk')
                ->store('stnk', 'public');

            if ($fotoStnkLama) {
                Storage::disk('public')->delete($fotoStnkLama);
            }
        }

        // Ganti foto KTP lama jika ada foto baru.
        if ($request->hasFile('foto_ktp')) {

            $fotoKtpLama = $wajibPajak->foto_ktp;

            $validated['foto_ktp'] = $request->file('foto_ktp')
                ->store('ktp', 'public');

            if ($fotoKtpLama) {
                Storage::disk('public')->delete($fotoKtpLama);
            }
        }

        // Nomor antrean dan jenis pendaftaran tetap dipertahankan.
        $wajibPajak->update($validated);

        return redirect()
            ->route('pajakin.index')
            ->with('success', 'Data wajib pajak berhasil diperbarui.');
    }

    /**
     * Menampilkan tanda terima.
     * Mengkalkulasi nilai estimasi hadiah dan PPh Pasal 21.
     * Hanya wajib pajak berstatus MS yang boleh mengaksesnya.
     */
    public function tandaTerima(WajibPajak $wajibPajak)
    {
        if ($wajibPajak->status !== 'MS') {
            return redirect()
                ->route('pajakin.index')
                ->with(
                    'error',
                    'Akses ditolak! Tanda terima hanya tersedia untuk wajib pajak berstatus MS.'
                );
        }

        // Kalkulasi simulasi nilai hadiah & PPh 21
        $nilaiHadiah = 500000;
        $pph21 = $nilaiHadiah * 0.05; // 5%
        $totalNilai = $nilaiHadiah + $pph21;

        return view('pajakin.tanda-terima', compact('wajibPajak', 'nilaiHadiah', 'pph21', 'totalNilai'));
    }

    /**
     * Menghapus data wajib pajak.
     */
    public function destroy(WajibPajak $wajibPajak)
    {
        // Hapus foto STNK jika tersedia.
        if ($wajibPajak->foto_stnk) {
            Storage::disk('public')->delete($wajibPajak->foto_stnk);
        }

        // Hapus foto KTP jika tersedia.
        if ($wajibPajak->foto_ktp) {
            Storage::disk('public')->delete($wajibPajak->foto_ktp);
        }

        // Nomor antrean yang sudah terpakai tidak digunakan ulang.
        $wajibPajak->delete();

        return redirect()
            ->route('pajakin.index')
            ->with('success', 'Data wajib pajak berhasil dihapus.');
    }

    /**
     * Menghitung status berdasarkan tanggal jatuh tempo.
     *
     * MS  = tanggal jatuh tempo hari ini atau masih akan datang.
     * TMS = tanggal jatuh tempo sudah lewat.
     */
    private function hitungStatus($tanggalJatuhTempo)
    {
        $tanggal = Carbon::parse($tanggalJatuhTempo)->startOfDay();

        return $tanggal->greaterThanOrEqualTo(now()->startOfDay())
            ? 'MS'
            : 'TMS';
    }
}