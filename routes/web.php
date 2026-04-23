<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Auth\ControllerAuthUser;
use App\Http\Controllers\Auth\PenyewaAuthController;
use App\Http\Controllers\Master\ControllerUser;
use App\Http\Controllers\Master\PenyewaController;
use App\Http\Controllers\Dashboard\PenyewaDashboardController;


/*
|--------------------------------------------------------------------------
| AUTH (TAMU)
|--------------------------------------------------------------------------
*/

Route::prefix('auth')->group(function () {

    // ================= USER =================
    Route::prefix('user')->name('auth.user.')->group(function () {
        Route::get('/login', [ControllerAuthUser::class, 'login'])->name('login');
        Route::post('/login', [ControllerAuthUser::class, 'prosesLogin'])->name('proses');
        Route::get('/logout', [ControllerAuthUser::class, 'logout'])->name('logout');
    });

    // ================= PENYEWA =================
    Route::prefix('penyewa')->name('auth.penyewa.')->group(function () {
        Route::get('/login', [PenyewaAuthController::class, 'login'])->name('login');
        Route::post('/login', [PenyewaAuthController::class, 'prosesLogin'])->name('proses');

        Route::get('/register', [PenyewaAuthController::class, 'register'])->name('register');
        Route::post('/register', [PenyewaAuthController::class, 'prosesRegister'])->name('store');

        Route::get('/logout', [PenyewaAuthController::class, 'logout'])->name('logout');
    });
});


/*
|--------------------------------------------------------------------------
| LANDING (TAMU)
|--------------------------------------------------------------------------
*/

Route::controller(LandingController::class)->group(function () {

    Route::get('/', 'home')->name('home');

    Route::get('/detailartikel/{id}', 'detailArtikel')->name('detailartikel');

    Route::get('/daftarkategori', 'daftarKategori')->name('daftarkategori');
    Route::get('/kategori/{id}', 'kategori')->name('kategori');

    Route::get('/tag/{tag}', 'tag')->name('tag');

    Route::get('/tentang', 'tentang')->name('tentang');
    Route::get('/kontak', 'kontak')->name('kontak');
    Route::get('/daftarisi', 'daftarIsi')->name('daftarisi');
});


/*
|--------------------------------------------------------------------------
| ZONA USER (ADMIN & PETUGAS)
|--------------------------------------------------------------------------
*/

Route::prefix('user')->group(function () {

    // ================= DASHBOARD =================
    Route::prefix('dashboard')->group(function () {

        Route::view('/admin', 'user.dashboard.dashboardadmin')
            ->middleware('role:admin')
            ->name('dashboard.admin');

        Route::view('/petugas', 'user.dashboard.dashboardpetugas')
            ->middleware('role:petugas')
            ->name('dashboard.petugas');
    });


    // ================= MASTER USER (ADMIN ONLY) =================
    Route::prefix('master-user')
        ->middleware('role:admin')
        ->name('user.')
        ->group(function () {

            Route::get('/', [ControllerUser::class, 'index'])->name('index');
            Route::get('/create', [ControllerUser::class, 'create'])->name('create');
            Route::post('/store', [ControllerUser::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ControllerUser::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [ControllerUser::class, 'update'])->name('update');
            Route::get('/show/{id}', [ControllerUser::class, 'show'])->name('show');
            Route::delete('/delete/{id}', [ControllerUser::class, 'destroy'])->name('delete');
        });


    // ================= MASTER PENYEWA (ADMIN ONLY) =================
    Route::prefix('master-penyewa')
        ->middleware('role:admin')
        ->name('penyewa.')
        ->group(function () {

            Route::get('/', [PenyewaController::class, 'index'])->name('index');
            Route::get('/create', [PenyewaController::class, 'create'])->name('create');
            Route::post('/store', [PenyewaController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PenyewaController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [PenyewaController::class, 'update'])->name('update');
            Route::get('/show/{id}', [PenyewaController::class, 'show'])->name('show');
            Route::delete('/delete/{id}', [PenyewaController::class, 'destroy'])->name('delete');
        });
});


/*
|--------------------------------------------------------------------------
| ZONA PENYEWA (SETELAH LOGIN)
|--------------------------------------------------------------------------
*/

Route::prefix('penyewa')
    ->middleware(['penyewa'])
    ->group(function () {

        Route::get('/dashboard', [PenyewaDashboardController::class, 'index'])
            ->name('penyewa.dashboard');

    });