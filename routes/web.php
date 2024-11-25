<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TravelLogController;
use App\Http\Controllers\TerrainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\AchievementController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Public Routes
Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/login', function () {
    return Inertia::render('Login');
})->middleware('guest')->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest')->name('login.post');

// Registration Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', function () {
        return Inertia::render('Register');
    })->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.post');
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

		// Travel log routes
		Route::post('/entry/add', [TravelLogController::class, 'addTravelLogEntry'])->name('entry.add');
		Route::delete('/entry/{id}', [TravelLogController::class, 'deleteTravelLogEntry'])->name('entry.delete');

    // Milestone CRUD routes
    Route::resource('milestones', MilestoneController::class)->except(['create', 'edit']);

    // Profile routes
    Route::get('/profile', function () {
        return Inertia::render('Profile');
    })->name('profile');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Password update route
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

		// Logout route
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Additional Routes
Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/privacy', function () {
    return Inertia::render('Privacy');
})->name('privacy');

Route::get('/accessibility', function () {
    return Inertia::render('Accessibility');
})->name('accessibility');

require __DIR__.'/auth.php';