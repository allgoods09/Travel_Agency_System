<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
})->name('/');

Route::middleware('auth')->group(function () {
    Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
    Route::resource('packages', PackageController::class);

    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::resource('bookings', BookingController::class);

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::resource('customers', CustomerController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');


