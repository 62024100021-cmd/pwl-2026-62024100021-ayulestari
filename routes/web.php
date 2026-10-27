<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ScheduleController;

Route::redirect('/', '/dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('pasien', PatientController::class);

Route::get('/dokter', [DoctorController::class, 'index'])
    ->name('dokter.index');

Route::get('/dokter/create', [DoctorController::class, 'create'])
    ->name('dokter.create');

Route::post('/dokter', [DoctorController::class, 'store'])
    ->name('dokter.store');

Route::get('/dokter/{doctor}/edit', [DoctorController::class, 'edit'])
    ->name('dokter.edit');

Route::put('/dokter/{doctor}', [DoctorController::class, 'update'])
    ->name('dokter.update');

Route::get('/poli', [PoliController::class, 'index'])
    ->name('poli.index');

Route::get('/poli/{poli}', [PoliController::class, 'show'])
    ->name('poli.show');

Route::get('/jadwal', [ScheduleController::class, 'index'])
    ->name('jadwal.index');

Route::get('/jadwal/{hari}', [ScheduleController::class, 'show']);