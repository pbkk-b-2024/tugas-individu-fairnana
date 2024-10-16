<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserEventController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/comingsoon', [EventController::class, 'comingsoon'])->name('comingsoon');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users'); // Perbaiki ini untuk mengarah ke metode index
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');

    // Route untuk Event
    Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events.index');
    Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('/admin/events', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('/admin/events/{event}', [EventController::class, 'show'])->name('admin.events.show');
    Route::get('/admin/events/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/admin/events/{event_id}', [EventController::class, 'update'])->name('admin.events.update');
    Route::delete('/admin/events/{event}', [EventController::class, 'destroy'])->name('admin.events.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.delete');
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/users/events/current', [UserEventController::class, 'currentEvents'])->name('users.events.current');
    //Route::get('/users/events/upcoming', [UserEventController::class, 'upcomingEvents'])->name('users.events.upcoming');
    // Rute untuk menampilkan acara yang diikuti oleh pengguna
    Route::get('/users/events/my', [UserEventController::class, 'myEvents'])->name('users.events.my');

    // Rute untuk halaman pendaftaran acara
    Route::get('/events/registration/{event_id}', [UserEventController::class, 'showRegistrationForm'])->name('user.events.registration');

    // Rute untuk menangani pendaftaran acara
    Route::post('/events/register', [UserEventController::class, 'register'])->name('user.events.register');
});

Route::middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
});



require __DIR__ . '/auth.php';

// Sign in with social account
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
