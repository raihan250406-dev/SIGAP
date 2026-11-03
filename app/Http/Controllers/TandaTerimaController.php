<?php

namespace App\Http\Controllers;

use App\Models\WajibPajak;

class TandaTerimaController extends Controller
{
    /**
     * Menampilkan tanda terima.
     * Hanya wajib pajak berstatus MS yang dapat mengaksesnya.
     */
    public function show(WajibPajak $wajibPajak)
    {
        // Blokir akses tanda terima jika status TMS.
        if ($wajibPajak->status !== 'MS') {
            return redirect()
                ->route('pajakin.index')
                ->with(
                    'error',
                    'Akses ditolak! Tanda terima hanya tersedia untuk wajib pajak berstatus MS.'
                );
        }

        // Data tanda terima untuk wajib pajak berstatus MS.
        return view('pajakin.tanda-terima', [
            'wajibPajak' => $wajibPajak,
            'nilaiHadiah' => 50000,
            'pph21' => 2600,
            'totalNilai' => 52600,
            'fotoStnk' => $wajibPajak->foto_stnk,
        ]);
    }
}
