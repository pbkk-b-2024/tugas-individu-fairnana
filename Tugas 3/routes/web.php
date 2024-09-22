<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Event;
use App\Http\Controllers\EventController;

Route::get('/events', [EventController::class, 'index'])->name('events.index');


// Route untuk halaman utama
Route::get('/', function () {
    return view('login');
});

// Route untuk autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk halaman home
Route::get('/home', [HomeController::class, 'home'])->middleware('auth')->name('home');

// Route untuk admin
Route::get('/users', [AdminController::class, 'index'])->name('users.index');
Route::get('/users/add', [AdminController::class, 'create'])->name('users.create');
Route::post('/users', [AdminController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [AdminController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
