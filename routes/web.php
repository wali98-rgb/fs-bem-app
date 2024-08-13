<?php

use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('client.master');
});
Route::get('/about', function () {
    return view('client.pages.about');
})->name('about');

Route::get('/feedback', function () {
    return view('client.pages.feedback');
})->name('feedback');

// Route Admin Session
Route::prefix('!4dm1n')->group(function () {
    // Route Layouts
    Route::get('/', function () {
        return view('admin.pages.home');
    })->name('home');
    Route::resource('major', ProdiController::class);
    Route::resource('attendence', AttendenceController::class);
});

Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);

Route::get('register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [UserController::class, 'register']);
