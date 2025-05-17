<?php

use App\Http\Controllers\Admin\AksesController;
use App\Http\Controllers\Admin\EventacaraController;
use App\Http\Controllers\Admin\FinalisController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PenyelenggaraController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\VotersController;
use App\Http\Controllers\user\BerandaController;
use App\Http\Controllers\user\EventController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

Route::middleware(['auth'])->group(function () {

    // Route untuk halaman dashboard admin
    Route::get('/dashboard', [HomeController::class, 'index']);


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
        Route::get('/penyelenggara/dokumen/{id}/{tipe}', [PenyelenggaraController::class, 'lihatDokumen'])->name('penyelenggara.dokumen');
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


    // Route untuk halaman finalis
    Route::prefix('finalis')->group(function () {
        Route::get('/', [FinalisController::class, 'index'])->name('finalis.index');
        Route::get('/create', [FinalisController::class, 'create'])->name('finalis.create');
        Route::post('/create', [FinalisController::class, 'store'])->name('finalis.store');
        Route::get('/{id_kandidat}/edit', [FinalisController::class, 'edit'])->name('finalis.edit');
        Route::post('/{id_kandidat}/edit', [FinalisController::class, 'update'])->name('finalis.update');
        Route::get('/{id_kandidat}/delete', [FinalisController::class, 'delete'])->name('finalis.delete');
    });


    // Route untuk halaman event votes
    Route::prefix('event-votes')->group(function () {
        Route::get('/', [VotersController::class, 'index'])->name('votes.index');
    });



    // Route untuk halaman detail event votes transaksi
    Route::prefix('transaksi')->group(function () {
        Route::get('/detail', [TransaksiController::class, 'detail'])->name('votes.detail');
        Route::get('/all', [TransaksiController::class, 'all_transaksi'])->name('votes.all');
    });



    // Route untuk logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});




// Route untuk halaman beranda user
Route::get('/', [BerandaController::class, 'index']);
Route::get('/event/{url}', [EventController::class, 'index']);
Route::get('/event/{url}/{id}', [EventController::class, 'kandidatDetail']);
Route::post('vote/checkout', [EventController::class, 'checkout']);

Route::get('/vote/detail/{id}', [EventController::class, 'checkoutDetail']);
Route::get('/vote/statusPesanan', [EventController::class, 'statusPesanan']);
