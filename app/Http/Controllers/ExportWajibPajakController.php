<?php

namespace App\Http\Controllers;

use App\Exports\WajibPajakExport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ExportWajibPajakController extends Controller
{
    public function export(Request $request)
    {
        $filterTipe = $request->input('filter_tipe');
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
        $labelPeriode = null;

        // Filter Otomatis Berdasarkan Tipe Preset
        if ($filterTipe === 'hari') {
            $tanggalMulai = Carbon::today()->toDateString();
            $tanggalSelesai = Carbon::today()->toDateString();
            $labelPeriode = 'Hari Ini (' . Carbon::today()->translatedFormat('d F Y') . ')';

        } elseif ($filterTipe === 'minggu') {
            $tanggalMulai = Carbon::now()->startOfWeek()->toDateString();
            $tanggalSelesai = Carbon::now()->endOfWeek()->toDateString();
            $labelPeriode = 'Minggu Ini (' . Carbon::now()->startOfWeek()->translatedFormat('d M') . ' - ' . Carbon::now()->endOfWeek()->translatedFormat('d M Y') . ')';

        } elseif ($filterTipe === 'bulan') {
            $tanggalMulai = Carbon::now()->startOfMonth()->toDateString();
            $tanggalSelesai = Carbon::now()->endOfMonth()->toDateString();
            $labelPeriode = 'Bulan ' . Carbon::now()->translatedFormat('F Y');
        }

        // Penamaan file dinamis berdasarkan tanggal ekspor
        $namaFile = 'data-wajib-pajak-pajakin-' . now()->format('Ymd-His') . '.xlsx';

        return Excel::download(
            new WajibPajakExport($tanggalMulai, $tanggalSelesai, $labelPeriode),
            $namaFile
        );
    }
}