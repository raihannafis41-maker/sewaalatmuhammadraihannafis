<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLER
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Dashboard\DashboardController;

// MASTER
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Master\PenyewaController;
use App\Http\Controllers\Master\KategoriController;
use App\Http\Controllers\Master\MerkController;
use App\Http\Controllers\Master\KondisiController;
use App\Http\Controllers\Master\AlatController;


/*
|--------------------------------------------------------------------------
| DEFAULT LOGIN (WAJIB UNTUK AUTH MIDDLEWARE)
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
| AUTH PENYEWA (SEMENTARA VIEW)
|--------------------------------------------------------------------------
*/
Route::prefix('auth/penyewa')->name('auth.penyewa.')->group(function () {

    Route::get('/login', function () {
        return view('auth.loginpenyewa');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.registerpenyewa');
    })->name('register');

    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
});


/*
|--------------------------------------------------------------------------
| LANDING (TAMU)
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
| DASHBOARD + MASTER DATA (SETELAH LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::prefix('dashboard')->group(function () {

        // 🔐 ADMIN
        Route::middleware('role:admin')->group(function () {

            Route::get('/admin', [DashboardController::class, 'admin'])
                ->name('dashboard.admin');

            /*
            |--------------------------------------------------------------------------
            | MASTER DATA (ADMIN)
            |--------------------------------------------------------------------------
            */
            Route::resource('/user', UserController::class);
            Route::resource('/penyewa', PenyewaController::class);
            Route::resource('/kategori', KategoriController::class);
            Route::resource('/merk', MerkController::class);
            Route::resource('/kondisi', KondisiController::class);
            Route::resource('/alat', AlatController::class);
        });


        // 🔐 PETUGAS
        Route::middleware('role:petugas')->group(function () {

            Route::get('/petugas', [DashboardController::class, 'petugas'])
                ->name('dashboard.petugas');

            /*
            |--------------------------------------------------------------------------
            | MASTER DATA (PETUGAS - OPSIONAL)
            |--------------------------------------------------------------------------
            */
            Route::resource('/penyewa', PenyewaController::class)->only(['index', 'show']);
            Route::resource('/alat', AlatController::class)->only(['index', 'show']);
        });
    });
});
