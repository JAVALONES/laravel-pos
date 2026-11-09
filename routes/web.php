<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/tfa', function () {
    return view('tfa6');
});
Route::get('/tfa/customers', function () {
    return view('tfa6');
});
Route::get('/tfa/tasks', function () {
    return view('tfa6');
});
Route::get('/tfa/profile', function () {
    return view('tfa6');
});

// New TFA7 routes
Route::resource('customers', CustomerController::class);
Route::resource('users', UserController::class);
