<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Models\Board;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
    /** @var User $user */
    $user = Auth::user();

    $totalPins = $user->pins()->count();
    $totalBoards = $user->boards()->count();
    $recentPins = $user->pins()->latest()->take(6)->get();

    return view('dashboard', compact('totalPins', 'totalBoards', 'recentPins'));
}
}
