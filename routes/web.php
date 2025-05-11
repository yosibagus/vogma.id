<?php

use App\Http\Controllers\Admin\AksesController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\user\BerandaController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

Route::middleware(['auth'])->group(function () {

// Route untuk halaman dashboard admin
Route::get('/home', [HomeController::class, 'index']);


// Akses Route
Route::prefix('akses')->group(function () {
    Route::get('/', [AksesController::class, 'index'])->name('users.index');
    Route::get('/create', [AksesController::class, 'create'])->name('users.create');
    Route::post('/create', [AksesController::class, 'store'])->name('users.store');
    Route::get('/{id}/edit', [AksesController::class, 'edit'])->name('users.edit');
    Route::post('/{id}/edit', [AksesController::class, 'update'])->name('users.update');
    Route::get('/{id}/delete', [AksesController::class, 'delete'])->name('users.delete');
});


// Route untuk logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});




// Route untuk halaman beranda user
Route::get('/beranda', [BerandaController::class, 'index']);
