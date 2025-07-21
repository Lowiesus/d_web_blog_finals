<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/signup', function (){
    return view('signup');
});

Route::post('/signup', [LoginController::class, 'signup'])->name('signup');