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

    Route::get('/kategori/{id?}', 'kategori')->name('kategori');
    Route::get('/daftarkategori', 'daftarKategori')->name('daftarkategori');

    Route::get('/tentang', 'tentang')->name('tentang');
    Route::get('/kontak', 'kontak')->name('kontak');
    Route::get('/daftarisi', 'daftarIsi')->name('daftarisi');
});


/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN & PETUGAS
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    // ================= ADMIN =================
    Route::middleware('role:admin')->group(function () {

        Route::get('/admin', [DashboardController::class, 'admin'])
            ->name('dashboard.admin');

        Route::resource('/user', UserController::class);

        // 🔥 penting: kasih prefix admin biar tidak bentrok
        Route::resource('/admin/penyewa', PenyewaController::class)
            ->names('admin.penyewa');

        Route::resource('/kategori', KategoriController::class);
        Route::resource('/merk', MerkController::class);
        Route::resource('/kondisi', KondisiController::class);
        Route::resource('/alat', AlatController::class);
    });

    // ================= PETUGAS =================
    Route::middleware('role:petugas')->group(function () {

        Route::get('/petugas', [DashboardController::class, 'petugas'])
            ->name('dashboard.petugas');

        Route::resource('/petugas/penyewa', PenyewaController::class)
            ->only(['index', 'show'])
            ->names('petugas.penyewa');

        Route::resource('/alat', AlatController::class)
            ->only(['index', 'show']);
    });
});


/*
|--------------------------------------------------------------------------
| AREA PENYEWA (LOGIN SENDIRI)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:penyewa'])
    ->prefix('penyewa')
    ->name('penyewa.')
    ->group(function () {

        // DASHBOARD
        Route::get('/dashboard', function () {
            return view('zonaPenyewa.dashboard.Penyewa');
        })->name('dashboard');

        // PEMESANAN
        Route::resource('/pemesanan', PenyewaPemesananController::class);
    });