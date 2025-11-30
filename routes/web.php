<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminLessonController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\IsAdmin;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Optional redirect after login
Route::get('/redirect', function () {
    $user = auth()->user();

    if (! $user) {
        return redirect()->route('login');
    }

    return $user->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('home');
})->middleware('auth');

// Authenticated user routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'home'])->name('profile.home');
    Route::get('/profile/my-courses', [ProfileController::class, 'myCourses'])->name('profile.my-courses');

    // Enroll manual (kalau mau tetap dipakai)
    Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');

    // Midtrans payment flow
    Route::get('/courses/{course}/checkout', [PaymentController::class, 'checkout'])->name('payments.checkout');
    Route::post('/payments/complete', [PaymentController::class, 'complete'])->name('payments.complete');
});

// Admin routes
Route::prefix('admin')
    ->middleware(['auth', IsAdmin::class])
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('courses', AdminCourseController::class);
        Route::resource('courses.lessons', AdminLessonController::class);
    });
