<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Models\Pin;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    // NEW: Server-side Image Download Route to bypass CORS
    Route::get('/download-image', function (Request $request) {
        $url = $request->query('url');
        $filename = $request->query('name', 'pinspire-image.jpg');

        if (!$url) abort(400, 'Image URL is required');

        // If it's a local file (uploaded by admin)
        if (!str_starts_with($url, 'http')) {
            $path = str_replace(asset('storage/'), '', $url);
            if (Storage::disk('public')->exists($path)) {
                return Storage::disk('public')->download($path, $filename);
            }
            abort(404, 'Local file not found');
        }

        // If it's an external URL (Pinterest/Unsplash link)
        try {
            $contents = file_get_contents($url);
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->buffer($contents);

            return response($contents, 200, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ]);
        } catch (\Exception $e) {
            abort(404, 'Could not fetch external image');
        }
    })->name('download.image');
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
