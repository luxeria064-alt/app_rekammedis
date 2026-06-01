<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::middleware('role:admin|petugas')->group(function () {
        Route::resource('pasien', PasienController::class);
    });

    Route::middleware('role:admin')->group(function () {
        Route::resource('dokter', DokterController::class);
    });

    Route::middleware('role:admin|dokter')->group(function () {
        Route::resource('rekam-medis', RekamMedisController::class);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';