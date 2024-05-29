<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BadanAdhocDetailController;


// Route::get('/', function () {
//     return view('welcome');
// });
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
});

// Rute untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');