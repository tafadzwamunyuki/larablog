<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
    IMPORTANT:
        FOLLOW PRECEDENCE OF ROUTES TO PREVENT UNNECESSARY ERRORS!


Route::get('/', function () {
    return view('welcome');
});

*/

// To welcome page
Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

// To blog page
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

// Create blog post
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');

// To single blog post
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// Edit blog post
Route::get('/blog/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');

// Update blog post
Route::put('/blog/{post}', [BlogController::class, 'update'])->name('blog.update');

// Delete blog post
Route::delete('/blog/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');

// Store blog post in DB
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');

// To about page
Route::get('/about', function(){
    return view('about');
})->name('about');

// To contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Category resource controller
Route::resource('/categories', CategoryController::class);

/*

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

*/

// To Send data to email.
//Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
