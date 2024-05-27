<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('client.master');
});

// Route Admin Session
Route::get('/!4dm1n', function () {
    return view('admin.pages.home');
});

Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);

Route::get('register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [UserController::class, 'register']);
