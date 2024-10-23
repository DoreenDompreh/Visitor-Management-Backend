<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register'); // Show registration form
Route::post('/register', [RegisterController::class, 'register']); // Handle form submission


// Display login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle login submission
Route::post('/login', [LoginController::class, 'login']);

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard (protected by auth middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

