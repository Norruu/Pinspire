<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Pin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PinController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $pins = $user->pins()->with('board')->latest()->paginate(12);

        return view('pins.index', compact('pins'));
    }

    public function create()
    {
        /** @var User $user */
        $user = Auth::user();

        $boards = $user->boards()->get();

        return view('pins.create', compact('boards'));
    }

    public function store(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'board_id' => ['nullable', 'integer', 'exists:boards,id'],
        ]);

        // Ensure board belongs to current user (if provided)
        if (!empty($validated['board_id'])) {
            Board::query()
                ->whereKey($validated['board_id'])
                ->where('user_id', $user->getKey())
                ->firstOrFail();
        }

        $path = $request->file('image')->store('pins', 'public');

        Pin::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'image' => $path,
            'user_id' => $user->getKey(),
            'board_id' => $validated['board_id'] ?? null,
        ]);

        return redirect()->route('pins.index')->with('success', 'Pin created successfully.');
    }

    public function edit(Pin $pin)
    {
        $userId = (int) Auth::id();

        abort_if((int) $pin->user_id !== $userId, 403);

        /** @var User $user */
        $user = Auth::user();

        $boards = $user->boards()->get();

        return view('pins.edit', compact('pin', 'boards'));
    }

    public function update(Request $request, Pin $pin)
    {
        $userId = (int) Auth::id();

        abort_if((int) $pin->user_id !== $userId, 403);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'board_id' => ['nullable', 'integer', 'exists:boards,id'],
        ]);

        // If board_id provided, ensure it belongs to current user
        if (!empty($validated['board_id'])) {
            /** @var User $user */
            $user = Auth::user();

            Board::query()
                ->whereKey($validated['board_id'])
                ->where('user_id', $user->getKey())
                ->firstOrFail();
        }

        if ($request->hasFile('image')) {
            if ($pin->image && Storage::disk('public')->exists($pin->image)) {
                Storage::disk('public')->delete($pin->image);
            }

            $validated['image'] = $request->file('image')->store('pins', 'public');
        }

        $pin->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'board_id' => $validated['board_id'] ?? null,
            'image' => $validated['image'] ?? $pin->image,
        ]);

        return redirect()->route('pins.index')->with('success', 'Pin updated.');
    }

    public function destroy(Pin $pin)
    {
        $userId = (int) Auth::id();

        abort_if((int) $pin->user_id !== $userId, 403);

        if ($pin->image && Storage::disk('public')->exists($pin->image)) {
            Storage::disk('public')->delete($pin->image);
        }

        $pin->delete();

        return back()->with('success', 'Pin deleted.');
    }
}
