<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('login');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/signup', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('signup');
});
Route::get('/signup', function (){
    return view('signup');
});

Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/signup', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/featured', function () {
    // You can return a view or redirect as needed
    return view('home'); // or create a separate featured.blade.php if you want
})->name('featured');

Route::get('/products/top', function () {
    // You can return a view or placeholder for now
    return view('home'); // or create a separate products_top.blade.php if you want
})->name('products.top');

Route::middleware(['web'])->group(function () {
    Route::post('/signup', [RegisterController::class, 'signup']);
});
