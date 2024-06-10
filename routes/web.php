<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BadanAdhocDetailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;

// Rute untuk register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

// Rute untuk login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Middleware 'auth' akan memeriksa apakah pengguna telah login sebelum mengakses halaman utama
Route::middleware(['auth'])->group(function () {
    // Rute untuk halaman utama (index)
    Route::get('/', function () {
        return view('index'); // Mengembalikan tampilan index
    })->name('index');

    Route::get('/detail_badan_adhoc', [BadanAdhocDetailController::class, 'index'])->name('badan_adhoc_details.index');
    Route::get('/detail_badan_adhoc/create', [BadanAdhocDetailController::class, 'create'])->name('badan_adhoc_details.create');
    Route::post('/detail_badan_adhoc', [BadanAdhocDetailController::class, 'store'])->name('badan_adhoc_details.store');
    Route::delete('/detail_badan_adhoc/{id}', [BadanAdhocDetailController::class, 'destroy'])->name('badan_adhoc_details.destroy');
    Route::get('detail_badan_adhoc/{id}/edit', [BadanAdhocDetailController::class, 'edit'])->name('badan_adhoc_details.edit');
    Route::put('detail_badan_adhoc/{id}', [BadanAdhocDetailController::class, 'update'])->name('badan_adhoc_details.update');
});

Route::middleware(['auth', 'level:1'])->group(function () {
    // Route untuk admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    // Route untuk charts hanya bisa diakses oleh admin (level 1)
    Route::get('/charts/badan_adhoc', [BadanAdhocDetailController::class, 'chart'])->name('charts.badan_adhoc');
});

Route::middleware(['auth', 'level:2'])->group(function () {
    // Route untuk operator kabko
    Route::get('/operator', [OperatorController::class, 'index'])->name('operator.index');
});

// Rute untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');