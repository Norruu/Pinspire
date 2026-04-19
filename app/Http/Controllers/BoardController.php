<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $boards = $user->boards()
            ->withCount('pins')
            ->latest()
            ->paginate(10);

        return view('boards.index', compact('boards'));
    }

    public function create()
    {
        return view('boards.create');
    }

    public function store(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        $user->boards()->create($validated);

        return redirect()->route('boards.index')->with('success', 'Board created.');
    }

    public function edit(Board $board)
    {
        $userId = (int) Auth::id();

        abort_if((int) $board->user_id !== $userId, 403);

        return view('boards.edit', compact('board'));
    }

    public function update(Request $request, Board $board)
    {
        $userId = (int) Auth::id();

        abort_if((int) $board->user_id !== $userId, 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        $board->update($validated);

        return redirect()->route('boards.index')->with('success', 'Board updated.');
    }

    public function destroy(Board $board)
    {
        $userId = (int) Auth::id();

        abort_if((int) $board->user_id !== $userId, 403);

        $board->delete();

        return back()->with('success', 'Board deleted.');
    }
}
