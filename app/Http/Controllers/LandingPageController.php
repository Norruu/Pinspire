<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');

        $pins = Pin::with('user', 'board')
            ->when($q, fn($query) => $query->where('title', 'like', "%{$q}%")
                ->orWhere('description', 'like', "%{$q}%"))
            ->latest()
            ->paginate(20);

        return view('welcome', compact('pins', 'q'));
    }
}
