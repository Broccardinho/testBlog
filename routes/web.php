<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ContactController; // Add this line

Route::get('/', [PagesController::class, 'index']);
Route::resource('/blog', PostsController::class);

Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Calendar
Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');

// History
Route::get('/history', function () {
    return view('history');
})->name('history');

// Teams
Route::get('/teams', function () {
    // ... (keep your existing teams code)
})->name('teams');

// About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Contact Routes (Updated)
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send'); // Add this line
