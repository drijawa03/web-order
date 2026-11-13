<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Halaman depan
Route::get('/', [PageController::class, 'home'])->name('home');

// Order oleh pelanggan
Route::get('/order/sukses/{code}', [OrderController::class, 'success'])->name('order.success');
Route::get('/order/{type}', [OrderController::class, 'create'])->whereIn('type', ['gambar', 'motion'])->name('order.create');
Route::post('/order/{type}', [OrderController::class, 'store'])->whereIn('type', ['gambar', 'motion'])->name('order.store');

// Cek status order
Route::get('/cek-order', [OrderController::class, 'trackForm'])->name('order.track');
Route::post('/cek-order', [OrderController::class, 'track'])->middleware('throttle:10,1')->name('order.track.check');

// Login admin
Route::get('/admin/login', [AdminController::class, 'loginForm'])->middleware('guest')->name('login');
Route::post('/admin/login', [AdminController::class, 'login'])->middleware('throttle:5,1')->name('login.attempt');

// Halaman admin: hanya untuk yang sudah login
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/orders', [AdminController::class, 'index'])->name('orders');
    Route::get('/orders/{order}', [AdminController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}', [AdminController::class, 'update'])->name('orders.update');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});

Route::redirect('/admin', '/admin/login');
