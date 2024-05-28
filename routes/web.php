<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    // Rute lainnya yang terkait dengan halaman utama, seperti upload, edit, update, dll.
});


// Rute untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');