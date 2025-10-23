<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('home');
})->name('/');

Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');

Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
