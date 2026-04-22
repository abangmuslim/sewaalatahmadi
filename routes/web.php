<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Auth\ControllerAuthUser;


/*
|--------------------------------------------------------------------------
| AUTH (TAMU)
|--------------------------------------------------------------------------
| Semua halaman login/register hanya untuk yang belum login
*/

Route::prefix('auth')->group(function () {

    // USER (ADMIN & PETUGAS)
    Route::prefix('user')->name('auth.user.')->group(function () {
        Route::get('/login', [ControllerAuthUser::class, 'login'])->name('login');
        Route::post('/login', [ControllerAuthUser::class, 'prosesLogin'])->name('proses');
        Route::get('/logout', [ControllerAuthUser::class, 'logout'])->name('logout');
    });

    // PENYEWA (sementara masih view)
    Route::prefix('penyewa')->name('auth.penyewa.')->group(function () {
        Route::get('/login', function () {
            return view('auth.loginpenyewa');
        })->name('login');

        Route::get('/register', function () {
            return view('auth.registerpenyewa');
        })->name('register');
    });
});


/*
|--------------------------------------------------------------------------
| LANDING / TAMU
|--------------------------------------------------------------------------
*/

Route::prefix('/')->group(function () {

    // HOME
    Route::get('/', [LandingController::class, 'home'])->name('home');

    // ARTIKEL
    Route::get('/detailartikel/{id}', [LandingController::class, 'detailArtikel'])->name('detailartikel');

    // KATEGORI
    Route::get('/daftarkategori', [LandingController::class, 'daftarKategori'])->name('daftarkategori');
    Route::get('/kategori/{id}', [LandingController::class, 'kategori'])->name('kategori');

    // TAG
    Route::get('/tag/{tag}', [LandingController::class, 'tag'])->name('tag');

    // HALAMAN STATIS
    Route::get('/tentang', [LandingController::class, 'tentang'])->name('tentang');
    Route::get('/kontak', [LandingController::class, 'kontak'])->name('kontak');
    Route::get('/daftarisi', [LandingController::class, 'daftarIsi'])->name('daftarisi');

});


/*
|--------------------------------------------------------------------------
| DASHBOARD USER (ADMIN & PETUGAS)
|--------------------------------------------------------------------------
| (NANTI WAJIB pakai middleware)
*/

Route::prefix('dashboard')->group(function () {

    Route::get('/admin', function () {
        return view('user.dashboard.dashboardadmin');
    })->name('dashboard.admin');

    Route::get('/petugas', function () {
        return view('user.dashboard.dashboardpetugas');
    })->name('dashboard.petugas');

});