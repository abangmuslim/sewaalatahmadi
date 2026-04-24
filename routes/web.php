<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Landing\LandingController;

use App\Http\Controllers\Auth\ControllerAuthUser;
use App\Http\Controllers\Auth\PenyewaAuthController;

use App\Http\Controllers\Dashboard\PenyewaDashboardController;

use App\Http\Controllers\Master\ControllerUser;
use App\Http\Controllers\Master\PenyewaController;

use App\Http\Controllers\Transaksi\ArtikelController;
use App\Http\Controllers\Transaksi\KomentarController;

/*
|--------------------------------------------------------------------------
| LOGIN REDIRECT
|--------------------------------------------------------------------------
*/

Route::get('/login', fn() => redirect()->route('login.user'))->name('login');

/*
|--------------------------------------------------------------------------
| LANDING (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::controller(LandingController::class)->name('landing.')->group(function () {

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
| AUTH USER (ADMIN & PETUGAS)
|--------------------------------------------------------------------------
*/
Route::get('/loginuser', [ControllerAuthUser::class, 'login'])->name('login.user');
Route::post('/loginuser', [ControllerAuthUser::class, 'prosesLogin'])->name('login.user.post');
Route::post('/logoutuser', [ControllerAuthUser::class, 'logout'])->name('logout.user');

/*
|--------------------------------------------------------------------------
| AUTH PENYEWA (SESSION MANUAL)
|--------------------------------------------------------------------------
*/
Route::get('/loginpenyewa', [PenyewaAuthController::class, 'login'])->name('login.penyewa');
Route::post('/loginpenyewa', [PenyewaAuthController::class, 'prosesLogin'])->name('login.penyewa.post');

Route::get('/registerpenyewa', [PenyewaAuthController::class, 'register'])->name('register.penyewa');
Route::post('/registerpenyewa', [PenyewaAuthController::class, 'prosesRegister'])->name('register.penyewa.post');

Route::post('/logoutpenyewa', [PenyewaAuthController::class, 'logout'])->name('logout.penyewa');

/*
|--------------------------------------------------------------------------
| BACKEND ADMIN & PETUGAS
|--------------------------------------------------------------------------
*/
Route::prefix('dashboard')
    ->middleware(['auth:web', 'role:admin,petugas'])
    ->group(function () {

        Route::get('/', function () {
            $user = Auth::user();

            return match ($user->role) {
                'admin' => redirect()->route('dashboard.admin'),
                'petugas' => redirect()->route('dashboard.petugas'),
                default => redirect()->route('login.user'),
            };
        })->name('dashboard');

        Route::get('/admin', fn() => view('user.dashboard.dashboardadmin'))
            ->middleware('role:admin')
            ->name('dashboard.admin');

        Route::get('/petugas', fn() => view('user.dashboard.dashboardpetugas'))
            ->middleware('role:petugas')
            ->name('dashboard.petugas');

        Route::middleware('role:admin')->group(function () {
            Route::resource('user', ControllerUser::class);
        });

        Route::middleware('role:admin,petugas')->group(function () {
            Route::resource('penyewa', PenyewaController::class);
            Route::resource('artikel', ArtikelController::class);
            Route::resource('komentar', KomentarController::class);
        });
    });

/*
|--------------------------------------------------------------------------
| ZONA PENYEWA (SESSION ONLY)
|--------------------------------------------------------------------------
*/
Route::prefix('penyewa')
    ->middleware([\App\Http\Middleware\PenyewaMiddleware::class])
    ->name('penyewa.')
    ->group(function () {
        Route::get('/dashboard', [PenyewaDashboardController::class, 'index'])
            ->name('dashboard');
    });
