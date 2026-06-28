<?php

use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

//hotel routes
Route::get('/hotels', [HotelsController::class, 'index'])->name('hotels.index');
Route::get('/hotels/create', [HotelsController::class, 'create'])->name('hotels.create');
Route::post('/hotels', [HotelsController::class, 'store'])->name('hotels.store');
Route::get('/hotels/{id}', [HotelsController::class, 'show'])->name('hotels.show');
Route::get('/hotels/{id}/edit', [HotelsController::class, 'edit'])->name('hotels.edit');
Route::put('/hotels/{id}', [HotelsController::class, 'update'])->name('hotels.update');
Route::delete('/hotels/{id}', [HotelsController::class, 'destroy'])->name('hotels.destroy');

Route::get('/booking/{id}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking/{id}', [BookingController::class, 'store'])->name('booking.store');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/hotels', [AdminController::class, 'hotels'])->name('hotels');
        Route::get('/rooms', [AdminController::class, 'rooms'])->name('rooms');
        Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings');

        Route::resource('hotels/{hotel}/rooms', RoomController::class)
            ->names('rooms')
            ->except(['show']);
    });
});
