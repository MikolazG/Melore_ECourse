<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing');
});

Route::get('/login', function () {
    return view('layouts.auth.login');
});

Route::get('/register', function () {
    return view('layouts.auth.register');
});
