<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StoryController;

// Homepage: Load from controller with stories
Route::get('/', [StoryController::class, 'index'])->name('home');

// Login
Route::get('/login', function () {
    return Auth::check() ? redirect('/home') : view('login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Signup
Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/signup', [RegisterController::class, 'signup'])->name('signup');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// View a story
Route::get('/stories/{story_id}', [StoryController::class, 'show'])->name('stories.show');

// Store a new story (authenticated users only)
Route::post('/', [StoryController::class, 'store'])->name('stories.store')->middleware('auth');

// Like a story
Route::post('/stories/{id}/like', [StoryController::class, 'like'])->name('stories.like');

// Featured stories
Route::get('/featured', [StoryController::class, 'featured'])->name('featured');

// Placeholder route
Route::get('/products/top', function () {
    return view('home');
})->name('products.top');