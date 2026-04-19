<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use Illuminate\Support\Facades\Storage;

class PinManagementController extends Controller
{
    public function index()
    {
        $pins = Pin::with('user', 'board')->latest()->paginate(20);
        return view('admin.pins.index', compact('pins'));
    }

    public function destroy(Pin $pin)
    {
        if ($pin->image && Storage::disk('public')->exists($pin->image)) {
            Storage::disk('public')->delete($pin->image);
        }

        $pin->delete();
        return back()->with('success', 'Pin removed by admin.');
    }
}
