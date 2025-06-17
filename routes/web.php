<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('beranda');
});

// Route::get('/books', [BukuController::class, 'index']);
// Route::get('/books/{nama}', [BukuController::class, 'show']);

Route::resource('buku', BukuController::class);
// Route::resource('/', UserController::class, 'index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('buku', BukuController::class);
});

Route::get('/registrasi', [AuthController::class, 'showRegisterForm'])->name('registrasi.form');
Route::post('/registrasi', [AuthController::class, 'register'])->name('registrasi');

Route::get('/kategori_buku', [KategoriBukuController::class, 'index']);
Route::resource('kategori_buku', KategoriBukuController::class);

Route::get('kategori_buku/{id}/buku', [KategoriBukuController::class, 'tampilanBukuKategori'])->name('kategori_buku.buku');

Route::get('/auth/index', [UserController::class, 'index']);

Route::get('kategori_buku/{id}/buku', [KategoriBukuController::class, 'tampilanBukuKategori'])->name('kategori_buku.buku');

// Route::resource('auth', UserController::class);
Route::get('users/create', [UserController::class, 'create'])->name('user.create');

Route::resource('auth', UserController::class); 
// Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');