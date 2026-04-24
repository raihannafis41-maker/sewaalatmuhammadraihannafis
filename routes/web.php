<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLER
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\PenyewaAuthController;
use App\Http\Controllers\Dashboard\DashboardController;

// MASTER
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Master\PenyewaController;
use App\Http\Controllers\Master\KategoriController;
use App\Http\Controllers\Master\MerkController;
use App\Http\Controllers\Master\KondisiController;
use App\Http\Controllers\Master\AlatController;

// PENYEWA
use App\Http\Controllers\Penyewa\PemesananController as PenyewaPemesananController;

// TRANSAKSI
use App\Http\Controllers\Transaksi\ArtikelController;
use App\Http\Controllers\Transaksi\KomentarController;


/*
|--------------------------------------------------------------------------
| DEFAULT LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return redirect()->route('auth.user.login');
})->name('login');


/*
|--------------------------------------------------------------------------
| AUTH USER (ADMIN & PETUGAS)
|--------------------------------------------------------------------------
*/
Route::prefix('auth/user')->name('auth.user.')->group(function () {

    Route::get('/login', [UserAuthController::class, 'login'])->name('login');
    Route::post('/login', [UserAuthController::class, 'prosesLogin'])->name('proses');
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
});


/*
|--------------------------------------------------------------------------
| AUTH PENYEWA
|--------------------------------------------------------------------------
*/
Route::prefix('auth/penyewa')->name('auth.penyewa.')->group(function () {

    Route::get('/login', [PenyewaAuthController::class, 'login'])->name('login');
    Route::post('/login', [PenyewaAuthController::class, 'prosesLogin'])->name('proses');
    Route::post('/logout', [PenyewaAuthController::class, 'logout'])->name('logout');

    Route::get('/register', [PenyewaAuthController::class, 'register'])->name('register');
    Route::post('/register', [PenyewaAuthController::class, 'prosesRegister'])->name('prosesRegister');
});


/*
|--------------------------------------------------------------------------
| LANDING (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::controller(LandingController::class)->group(function () {

    Route::get('/', 'home')->name('home');
    Route::get('/detailartikel/{id}', 'detailArtikel')->name('detailartikel');

    // ✅ KOMENTAR UTAMA (penyewa)
    Route::post('/detailartikel/{id}/komentar', 'storeKomentar')
        ->middleware('auth:penyewa')
        ->name('komentar.store');

    Route::get('/kategori/{id?}', 'kategori')->name('kategori');
    Route::get('/daftarkategori', 'daftarKategori')->name('daftarkategori');

    Route::get('/tentang', 'tentang')->name('tentang');
    Route::get('/kontak', 'kontak')->name('kontak');
    Route::get('/daftarisi', 'daftarIsi')->name('daftarisi');
});


/*
|--------------------------------------------------------------------------
| KOMENTAR REPLY (GLOBAL - ADMIN & PENYEWA)
|--------------------------------------------------------------------------
*/
Route::post('/komentar/reply', [KomentarController::class, 'store'])
    ->name('komentar.reply');


/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN & PETUGAS
|--------------------------------------------------------------------------
*/
Route::prefix('dashboard')->middleware(['auth'])->group(function () {

    /*
    |================= ADMIN =================
    */
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {

        Route::get('/', [DashboardController::class, 'admin'])->name('dashboard');

        Route::resource('user', UserController::class);
        Route::resource('penyewa', PenyewaController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('merk', MerkController::class);
        Route::resource('kondisi', KondisiController::class);
        Route::resource('alat', AlatController::class);

        Route::resource('artikel', ArtikelController::class);
        Route::resource('komentar', KomentarController::class);
    });


    /*
    |================= PETUGAS =================
    */
    Route::prefix('petugas')->name('petugas.')->middleware('role:petugas')->group(function () {

        Route::get('/', [DashboardController::class, 'petugas'])->name('dashboard');

        Route::resource('penyewa', PenyewaController::class)
            ->only(['index', 'show']);

        Route::resource('alat', AlatController::class)
            ->only(['index', 'show']);

        Route::resource('artikel', ArtikelController::class)
            ->only(['index', 'show']);

        Route::resource('komentar', KomentarController::class)
            ->only(['index', 'show']);
    });

});


/*
|--------------------------------------------------------------------------
| AREA PENYEWA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:penyewa'])
    ->prefix('penyewa')
    ->name('penyewa.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('zonaPenyewa.dashboard.Penyewa');
        })->name('dashboard');

        Route::resource('/pemesanan', PenyewaPemesananController::class);
    });