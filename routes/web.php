<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
