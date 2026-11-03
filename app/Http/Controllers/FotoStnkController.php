<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FotoStnkController extends Controller
{
    public function kamera(string $token)
    {
        $sesi = DB::table('foto_stnk_sessions')
            ->where('token', $token)
            ->where('expires_at', '>', now())
            ->first();

        abort_if(!$sesi, 404, 'Sesi foto tidak ditemukan atau sudah kedaluwarsa.');

        return view('pajakin.kamera-stnk', compact('token'));
    }

    public function upload(Request $request, string $token)
    {
        $sesi = DB::table('foto_stnk_sessions')
            ->where('token', $token)
            ->where('expires_at', '>', now())
            ->first();

        abort_if(!$sesi, 404, 'Sesi foto tidak ditemukan atau sudah kedaluwarsa.');

        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $pathBaru = $request->file('foto')->store('stnk', 'public');

        if ($sesi->foto_path) {
            Storage::disk('public')->delete($sesi->foto_path);
        }

        DB::table('foto_stnk_sessions')
            ->where('id', $sesi->id)
            ->update([
                'foto_path' => $pathBaru,
                'uploaded_at' => now(),
                'updated_at' => now(),
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Foto STNK berhasil dikirim ke PAJAKIN.',
        ]);
    }
    public function buatSesi()
{
    $token = \Illuminate\Support\Str::random(48);

    \Illuminate\Support\Facades\DB::table('foto_stnk_sessions')
        ->insert([
            'token' => $token,
            'foto_path' => null,
            'uploaded_at' => null,
            'expires_at' => now()->addMinutes(15),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    return response()->json([
        'success' => true,
        'token' => $token,
        'url' => route('foto-stnk.kamera', ['token' => $token]),
    ]);
}
}