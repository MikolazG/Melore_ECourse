<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('pages.landing');
});

Route::get('/login', function () {
    return view('layouts.auth.login');
});

Route::get('/register', function () {
    return view('layouts.auth.register');
});

Route::get('/courses', [CourseController::class, 'index']);