<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MemoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\MemoryController as AdminMemoryController;

Route::get('/test', function () {
    return 'Laravel berhasil jalan di Vercel!';
});


Route::get('/', [MemoryController::class, 'index']);


// =========================
// ADMIN AUTH
// =========================

Route::get('/admin/login', [AuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->name('admin.logout');


// =========================
// ADMIN
// =========================

Route::prefix('admin')
    ->name('admin.')
    ->middleware('admin')
    ->group(function () {

        Route::resource('memories', AdminMemoryController::class);

    });

Route::get('/test', function () {
    return 'Laravel berhasil jalan di Vercel!';
});