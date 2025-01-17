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
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ForPassController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('client.app');
})->name('dashboard');
Route::get('/about', function () {
    return view('client.pages.about');
})->name('about');

Route::get('/feedback', function () {
    return view('client.pages.feedback');
})->name('feedback');

// Route Admin Session
Route::prefix('!4dm1n')->middleware('auth')->group(function () {
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
    Route::resource('content', ContentController::class);

    // Jika di UserController tidak bisa memakai route user/{lain-lain} selain dari route resource controller lagi
    Route::get('/user_access', [UserController::class, 'showAccess'])->name('user.access');
    Route::put('/user_access/{id}', [UserController::class, 'addAccess'])->name('user.addAccess');

    Route::resource('department', DepartmentController::class);

    // Route documentations page
    Route::delete('/docum/{docum}/image/{imageIndex}', [DocumentationController::class, 'deleteImage'])->name('docum.deleteImage');
    Route::get('/docum/{docum}/image/{imageIndex}', [DocumentationController::class, 'showImage'])->name('docum.showImage');
    // Route content
    // Route untuk daftar konten
    Route::get('/contents', [ContentController::class, 'index'])->name('content.index');
    // Route untuk form tambah konten
    Route::get('/contents/create', [ContentController::class, 'create'])->name('content.create');
    // Route untuk menyimpan data konten
    Route::post('/contents/store', [ContentController::class, 'store'])->name('content.store');
});

// Route Auth
// Login Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Login dengan Google
Route::get('redirect', [SocialiteController::class, 'redirect'])->name('redirect');
Route::get('callback', [SocialiteController::class, 'callback'])->name('callback');

// Register Routes
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.action');

// Forgot Password Routes
Route::get('forgot/password', [ForPassController::class, 'showForgotPasswordForm'])->name('forgot.password.get');
Route::post('forgot/password', [ForPassController::class, 'submitForgotPasswordForm'])->name('forgot.password.post');
Route::get('reset/password/{token}', [ForPassController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset/password/{token}', [ForPassController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// Email Verification Routes
Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify-resend', [AuthController::class, 'verifyResend'])->middleware('auth')->name('verification.resend.link');
Route::get('/email/verify-resend-mail', [AuthController::class, 'verifyResendMail'])->middleware('auth')->name('verification.resend.mail');
Route::get('/verify-mail/{token}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::post('/email/verification-notification', [AuthController::class, 'verifyHandler'])->name('verification.send');

// Code Division Routes
Route::get('/verify-code/{token}', [AuthController::class, 'showCodeDivision'])->middleware('auth')->name('verification.code.get');
Route::post('/verify-code/{token}', [AuthController::class, 'submitCodeDivision'])->middleware('auth')->name('verification.code.post');
