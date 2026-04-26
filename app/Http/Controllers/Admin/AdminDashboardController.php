<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pin;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminDashboardController extends Controller
{
    // NO MORE __construct() HERE!

    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalPins' => Pin::count(),
            'totalBoards' => Board::count(),
            'recentUsers' => User::orderBy('created_at', 'desc')->take(10)->get(),
            'recentPins' => Pin::with('user')->orderBy('created_at', 'desc')->take(10)->get(),
        ]);
    }

    /* ==============================================================
       USER MANAGEMENT
    ============================================================== */

    public function updateUserRole(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot change your own role.');
        }

        $user->is_admin = !$user->is_admin;
        $user->save();

        $user->update(['is_admin' => !$user->is_admin]);
        return back()->with('success', 'User role updated successfully.');
    }

    public function deleteUser(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }

    /* ==============================================================
       PIN MANAGEMENT
    ============================================================== */

    public function storePin(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_upload' => 'nullable|image|max:4096',
            'image_link' => 'nullable|url',
        ]);

        if (!$request->hasFile('image_upload') && !$request->filled('image_link')) {
            return back()->with('error', 'You must provide an image file or an image link.');
        }

        if ($request->hasFile('image_upload')) {
            $imagePath = $request->file('image_upload')->store('pins', 'public');
        } else {
            $imagePath = $request->input('image_link');
        }

        Pin::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
            'user_id' => Auth::id(),
            'board_id' => null,
        ]);

        return back()->with('success', 'Pin added successfully.');
    }

        public function updatePin(Request $request, Pin $pin)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image_upload' => 'nullable|image|max:4096',
            'image_link' => 'nullable|url',
        ]);

        $dataToUpdate = [
            'title' => $request->input('title'),
        ];

        if ($request->hasFile('image_upload')) {
            if ($pin->image && !str_starts_with($pin->image, 'http')) {
                Storage::disk('public')->delete($pin->image);
            }
            $dataToUpdate['image'] = $request->file('image_upload')->store('pins', 'public');
        }
        elseif ($request->filled('image_link')) {
            if ($pin->image && !str_starts_with($pin->image, 'http') && $pin->image !== $request->input('image_link')) {
                Storage::disk('public')->delete($pin->image);
            }
            $dataToUpdate['image'] = $request->input('image_link');
        }

        $pin->update($dataToUpdate);

        return back()->with('success', 'Pin updated successfully.');
    }

        public function deletePin(Pin $pin)
    {
        if ($pin->image && !str_starts_with($pin->image, 'http')) {
            Storage::disk('public')->delete($pin->image);
        }

        $pin->delete();

        return back()->with('success', 'Pin deleted successfully.');
    }
}
