<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsensiController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('isLogin')->group(function() {
    Route::get('/login', [AuthController::class, 'login_page'])->name('login-page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::prefix('admin')->middleware('guru')->group( function() {
    Route::prefix('siswa')->group(function() {
        Route::get('', [SiswaController::class, 'dashboard_siswa_page'])->name('siswa.dashboard-siswa-page');
        Route::get('input-siswa', [SiswaController::class, 'input_siswa_page'])->name('siswa.input-siswa-page');
        Route::get('edit-siswa/{id}', [SiswaController::class, 'edit_siswa_page'])->name('siswa.edit-siswa-page');
    });

    Route::prefix('guru')->group(function() {
        Route::get('', [UserController::class, 'dashboard_guru_page'])->name('guru.dashboard-guru-page');
        Route::get('input-guru', [UserController::class, 'input_guru_page'])->name('guru.input-guru-page');
        Route::get('edit-guru/{id}', [UserController::class, 'edit_guru_page'])->name('guru.edit-guru-page');
    });

    Route::prefix('absensi')->group(function() {
        Route::get('', [AbsensiController::class, 'dashboard_absensi_page'])->name('absensi.dashboard-absensi-page');
        Route::get('input-absensi', [AbsensiController::class, 'input_absensi_page'])->name('absensi.input-absensi-page');
    });
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
