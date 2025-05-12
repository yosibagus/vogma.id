<?php

use App\Http\Controllers\Admin\AksesController;
use App\Http\Controllers\Admin\EventacaraController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PenyelenggaraController;
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


    // Route untuk halaman penyelenggara
    Route::prefix('penyelenggara')->group(function () {
        Route::get('/', [PenyelenggaraController::class, 'index'])->name('penyelenggara.index');
        Route::get('/create', [PenyelenggaraController::class, 'create'])->name('penyelenggara.create');
        Route::post('/create', [PenyelenggaraController::class, 'store'])->name('penyelenggara.store');
        Route::get('/{id_penyelenggara}/edit', [PenyelenggaraController::class, 'edit'])->name('penyelenggara.edit');
        Route::post('/{id_penyelenggara}/edit', [PenyelenggaraController::class, 'update'])->name('penyelenggara.update');
        Route::get('/{id_penyelenggara}/delete', [PenyelenggaraController::class, 'delete'])->name('penyelenggara.delete');
    });


    // Route untuk halaman event acara
    Route::prefix('event-acara')->group(function () {
        Route::get('/', [EventacaraController::class, 'index'])->name('event.index');
        Route::get('/create', [EventacaraController::class, 'create'])->name('event.create');
        Route::post('/create', [EventacaraController::class, 'store'])->name('event.store');
        Route::get('/{id_event}/edit', [EventacaraController::class, 'edit'])->name('event.edit');
        Route::post('/{id_event}/edit', [EventacaraController::class, 'update'])->name('event.update');
        Route::get('/{id_event}/delete', [EventacaraController::class, 'delete'])->name('event.delete');
    });


    // Route untuk logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});




// Route untuk halaman beranda user
Route::get('/beranda', [BerandaController::class, 'index']);
