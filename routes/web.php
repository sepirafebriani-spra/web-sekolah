<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfileSekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\EkstrakulikulerController;
use Illuminate\Support\Facades\Route;


// ================================================================
// LOGIN
// ================================================================

Route::get('/', [AuthController::class, 'index'])
    ->name('admin.login');

Route::post('Login-proses', [AuthController::class, 'processLogin'])
    ->name('admin.login.proses');


// ================================================================
// ADMIN
// ================================================================

Route::prefix('admin')->group(function () {

    // ============================================================
    // DASHBOARD
    // ============================================================

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');


    // ============================================================
    // PROFILE SEKOLAH
    // ============================================================

    Route::get('/Profile', [ProfileSekolahController::class, 'index'])
        ->name('admin.profile');

    Route::put('/Profile', [ProfileSekolahController::class, 'update'])
        ->name('admin.profile.update');

    Route::post('/Profile/photo', [ProfileSekolahController::class, 'updatePhoto'])
        ->name('admin.profile.photo');


    // ============================================================
    // EKSTRAKULIKULER
    // ============================================================

    Route::prefix('ekstrakulikuler')->group(function () {

        Route::get('/', [EkstrakulikulerController::class, 'index'])
            ->name('admin.ekstrakulikuler.index');

        Route::get('/add-edit/{id?}', [EkstrakulikulerController::class, 'addEdit'])
            ->name('admin.ekstrakulikuler.addEdit');

        Route::post('/save/{id?}', [EkstrakulikulerController::class, 'save'])
            ->name('admin.ekstrakulikuler.save');

        Route::get('/{id}', [EkstrakulikulerController::class, 'show'])
            ->name('admin.ekstrakulikuler.show');

        Route::delete('/{id}', [EkstrakulikulerController::class, 'destroy'])
            ->name('admin.ekstrakulikuler.delete');
    });


    // ============================================================
    // SISWA
    // ============================================================

    Route::prefix('siswa')->group(function () {

        Route::get('/', [SiswaController::class, 'index'])
            ->name('admin.siswa.index');

        Route::get('/add-edit/{id?}', [SiswaController::class, 'addEdit'])
            ->name('admin.siswa.addEdit');

        Route::post('/save/{id?}', [SiswaController::class, 'save'])
            ->name('admin.siswa.save');

        Route::get('/{id}', [SiswaController::class, 'show'])
            ->name('admin.siswa.show');

        Route::delete('/{id}', [SiswaController::class, 'destroy'])
            ->name('admin.siswa.delete');
    });


    // ============================================================
    // GURU
    // ============================================================

    Route::prefix('guru')->group(function () {

        Route::get('/', [GuruController::class, 'index'])
            ->name('admin.guru.index');

        Route::get('/add-edit/{id?}', [GuruController::class, 'addEdit'])->name('admin.guru.addEdit');

        Route::post('/save/{id?}', [GuruController::class, 'save'])
            ->name('admin.guru.save');

        Route::get('/{id}', [GuruController::class, 'show'])->name('admin.guru.show');

        Route::delete('/{id}', [GuruController::class, 'destroy'])
           ->name('admin.guru.destroy');
    });


    // ============================================================
    // GALERI
    // ============================================================

    Route::prefix('galeri')->group(function () {

        Route::get('/', [GaleriController::class, 'index'])
            ->name('admin.galeri.index');

        Route::get('/add-edit/{id?}', [GaleriController::class, 'addEdit'])
            ->name('admin.galeri.addEdit');

        Route::post('/save/{id?}', [GaleriController::class, 'save'])
            ->name('admin.galeri.save');

        Route::get('/{id}', [GaleriController::class, 'show'])
            ->name('admin.galeri.show');

        Route::delete('/{id}', [GaleriController::class, 'destroy'])
            ->name('admin.galeri.delete');
    });


    // ============================================================
    // BERITA
    // ============================================================

    Route::middleware(['auth'])->prefix('admin/berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/add-edit/{id?}', [BeritaController::class, 'addEdit'])->name('admin.berita.addEdit');
    Route::post('/save/{id?}', [BeritaController::class, 'save'])->name('admin.berita.save');
    Route::get('/show/{id}', [BeritaController::class, 'show'])->name('admin.berita.show');
    Route::delete('/delete/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.delete');
});
});
