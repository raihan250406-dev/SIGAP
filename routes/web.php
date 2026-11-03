
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WajibPajakController;
use App\Http\Controllers\ExportWajibPajakController;
use App\Http\Controllers\TandaTerimaController;
use App\Http\Controllers\FotoStnkController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| ROUTE LOGIN
|--------------------------------------------------------------------------
*/

// Form login
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login');

// Proses login
Route::post('/login', [LoginController::class, 'login'])
    ->middleware(['guest', 'throttle:5,1'])
    ->name('login.process');

/*
|--------------------------------------------------------------------------
| ROUTE PAJAKIN - WAJIB LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard PAJAKIN
    Route::get('/', [WajibPajakController::class, 'index'])
        ->name('pajakin.index');

    // Tambah data wajib pajak
    Route::post('/wajib-pajak', [WajibPajakController::class, 'store'])
        ->name('pajakin.store');

    // Form edit data wajib pajak
    Route::get('/wajib-pajak/{wajibPajak}/edit', [
        WajibPajakController::class,
        'edit',
    ])->name('pajakin.edit');

    // Simpan perubahan data wajib pajak
    Route::put('/wajib-pajak/{wajibPajak}', [
        WajibPajakController::class,
        'update',
    ])->name('pajakin.update');

    // Hapus data wajib pajak
    Route::delete('/wajib-pajak/{wajibPajak}', [
        WajibPajakController::class,
        'destroy',
    ])->name('pajakin.destroy');

    // Export data wajib pajak ke Excel
    Route::get('/export-excel', [
        ExportWajibPajakController::class,
        'export',
    ])->name('pajakin.export');

    // Tanda terima (status MS/TMS diperiksa di controller)
    Route::get('/wajib-pajak/{wajibPajak}/tanda-terima', [
        TandaTerimaController::class,
        'show',
    ])->name('pajakin.tanda-terima');

    // Halaman kamera STNK
    Route::get('/kamera-stnk/{token}', [
        FotoStnkController::class,
        'kamera',
    ])->name('foto-stnk.kamera');

    // Upload foto STNK
    Route::post('/kamera-stnk/{token}', [
        FotoStnkController::class,
        'upload',
    ])->name('foto-stnk.upload');

    // Membuat sesi foto STNK
    Route::post('/foto-stnk/sesi', [
        FotoStnkController::class,
        'buatSesi',
    ])->name('foto-stnk.sesi');

    // Logout
    Route::post('/logout', [
        LoginController::class,
        'logout',
    ])->name('logout');
});



Route::get('/diagnostic-session', function () {
    return response()->json([
        'laravel_version' => app()->version(),
        'session_driver' => config('session.driver'),
        'session_cookie' => config('session.cookie'),
        'session_secure' => config('session.secure'),
        'session_same_site' => config('session.same_site'),
        'request_secure' => request()->isSecure(),
        'session_started' => app('session')->isStarted(),
    ]);
});
