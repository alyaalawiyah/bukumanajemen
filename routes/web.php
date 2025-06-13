<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('beranda');
});

// Route::get('/books', [BukuController::class, 'index']);
// Route::get('/books/{nama}', [BukuController::class, 'show']);

Route::resource('buku', BukuController::class);
Route::resource('users', BukuController::class);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('buku', BukuController::class);
});

Route::get('/registrasi', [AuthController::class, 'showRegisterForm'])->name('registrasi.form');
Route::post('/registrasi', [AuthController::class, 'register'])->name('registrasi');

// Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');