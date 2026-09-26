
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfileSekolahController;
use App\Http\Controllers\SiswaController;
use App\Models\Ekstrakulikuler;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'index'])
    ->name('admin.login');

Route::post('Login-proses', [AuthController::class, 'processLogin'])
    ->name('admin.login.proses');


Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/ekstrakulikuler', [Ekstrakulikuler::class, 'index'])
        ->name('admin.ekstrakulikuler');

    // ================= GURU =================

    Route::get('/siswa', [SiswaController::class, 'index'])
        ->name('admin.siswa.index');
    Route::get('/create', [SiswaController::class, 'create'])
        ->name('admin.siswa.create');
    Route::get('/{id}/edit', [SiswaController::class, 'edit'])
        ->name('admin.siswa.edit');
    Route::get('/save/{id}', [SiswaController::class, 'save'])
        ->name('admin.siswa.save');
    Route::get('/{id}', [SiswaController::class, 'show'])
        ->name('admin.siswa.show');
    Route::get('/{id}', [SiswaController::class, 'delete'])
        ->name('admin.siswa.delete');

    // ================= GURU =================

    Route::get('/admin/guru', [GuruController::class, 'index'])
        ->name('admin.guru');

    Route::get('/admin/guru/create', [GuruController::class, 'create'])
        ->name('admin.guru.create');

    Route::post('/admin/guru', [GuruController::class, 'store'])
        ->name('admin.guru.store');

    Route::get('/admin/guru/{id}/edit', [GuruController::class, 'edit'])
        ->name('admin.guru.edit');

    Route::put('/admin/guru/{id}', [GuruController::class, 'update'])
        ->name('admin.guru.update');

    Route::delete('/admin/guru/{id}', [GuruController::class, 'destroy'])
        ->name('admin.guru.destroy');

    Route::get('/galeri', [GaleriController::class, 'index'])
        ->name('admin.galeri');

    Route::get('/berita', [BeritaController::class, 'index'])
        ->name('admin.berita');

    Route::get('/admin/Profile', [ProfileSekolahController::class, 'index'])
        ->name('admin.profile');

    Route::put('/admin/Profile', [ProfileSekolahController::class, 'update'])
        ->name('admin.profile');

    Route::post('/admin/Profile/photo', [ProfileSekolahController::class, 'updatePhoto'])
        ->name('admin.profile.photo');
});
