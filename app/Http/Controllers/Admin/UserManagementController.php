<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => ['required', 'in:user,admin']
        ]);

        $user->update(['role' => $validated['role']]);
        return back()->with('success', 'Role updated.');
    }

    public function destroy(User $user)
{
    if ((int) Auth::id() === (int) $user->getKey()) {
        return back()->with('error', 'You cannot delete yourself.');
    }

    $user->delete();
    return back()->with('success', 'User deleted.');
}
}
