<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle(Pin $pin)
    {
        $user = Auth::user();

        $exists = $user->favorites()->where('pin_id', $pin->id)->exists();

        if ($exists) {
            $user->favorites()->detach($pin->id);
            return back()->with('success', 'Removed from favorites.');
        }

        $user->favorites()->attach($pin->id);
        return back()->with('success', 'Added to favorites.');
    }
}
