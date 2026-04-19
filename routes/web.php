<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Models\Pin;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::get('/dashboard', function (Request $request) {
    // Start a query builder for Pins
    $query = Pin::query();

    // If there is a search term, filter the pins by title
    if ($request->has('search') && $request->search != '') {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    // Get the results (newest first)
    $pins = $query->latest()->get();

    return view('dashboard', ['pins' => $pins]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dashboard', function () {
    // Basic security check: Make sure they are logged in AND are an admin
    if (!Auth::check() || !Auth::user()->is_admin) {
        abort(403, 'Unauthorized action. You are not an admin.');
    }

    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

// Admin Routes Group
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // User Management
    Route::patch('/users/{user}/role', [AdminDashboardController::class, 'updateUserRole'])->name('users.role');
    Route::delete('/users/{user}', [AdminDashboardController::class, 'deleteUser'])->name('users.destroy');

    // Pin Management
    Route::post('/pins', [AdminDashboardController::class, 'storePin'])->name('pins.store');
    Route::patch('/pins/{pin}', [AdminDashboardController::class, 'updatePin'])->name('pins.update');
    Route::delete('/pins/{pin}', [AdminDashboardController::class, 'deletePin'])->name('pins.destroy');
});

require __DIR__ . '/auth.php';
