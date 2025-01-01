<?php

use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProkerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    Route::resource('proker', ProkerController::class);
    Route::resource('docum', DocumentationController::class);
    Route::resource('user', UserController::class);
    Route::resource('archive', ArchiveController::class);

    // Jika di UserController tidak bisa memakai route user/{lain-lain} selain dari route resource controller lagi
    Route::get('/user_access', [UserController::class, 'showAccess'])->name('user.access');
    Route::put('/user_access/{id}', [UserController::class, 'addAccess'])->name('user.addAccess');

    Route::resource('department', DepartmentController::class);

    // Route documentations page
    Route::delete('/docum/{docum}/image/{imageIndex}', [DocumentationController::class, 'deleteImage'])->name('docum.deleteImage');
    Route::get('/docum/{docum}/image/{imageIndex}', [DocumentationController::class, 'showImage'])->name('docum.showImage');
});

// Route Auth
// Login Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Register Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


// Password Reset Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Email Verification Routes
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');


