<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('pasien', PasienController::class)
        ->middleware('permission:kelola pasien');

    Route::resource('dokter', DokterController::class)
        ->middleware('permission:kelola dokter');

    Route::resource('rekam-medis', RekamMedisController::class)
        ->middleware('permission:kelola rekam medis');

    Route::get('/role', [RoleController::class, 'index'])
        ->name('role.index')
        ->middleware('permission:role-list');

    Route::get('/role/create', [RoleController::class, 'create'])
        ->name('role.create')
        ->middleware('permission:role-create');

    Route::post('/role', [RoleController::class, 'store'])
        ->name('role.store')
        ->middleware('permission:role-create');

    Route::get('/role/{role}/edit', [RoleController::class, 'edit'])
        ->name('role.edit')
        ->middleware('permission:role-edit');

    Route::put('/role/{role}', [RoleController::class, 'update'])
        ->name('role.update')
        ->middleware('permission:role-edit');

    Route::delete('/role/{role}', [RoleController::class, 'destroy'])
        ->name('role.destroy')
        ->middleware('permission:role-delete');

    Route::resource('permission', PermissionController::class)
        ->middleware('permission:role-list');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';