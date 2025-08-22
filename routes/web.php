<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Rute untuk user biasa
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('dashboard');
        // Anda bisa menambahkan rute admin lainnya di sini
        // Contoh:
        // Route::get('/pengguna', function () {
        //     return Inertia::render('Admin/Pengguna/Index');
        // })->name('pengguna');
    });
    // -------------------------
});
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
