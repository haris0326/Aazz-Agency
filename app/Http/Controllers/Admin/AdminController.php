<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Traits\Admin\Filterable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use Filterable;

    // ------------------------------------------------------------------
    // CHANGED: added search + role filter + sort + pagination
    // ------------------------------------------------------------------
    public function index(Request $request)
    {
        $users = $this->applyFilters(
            query: User::query(),
            request: $request,
            searchable: ['name', 'email', 'phone_number'],
            filters: ['role'],
            sortable: ['name', 'email', 'role', 'created_at'],
            defaultSort: 'created_at',
            defaultDirection: 'desc',
        )->paginate($request->integer('per_page', 15))->withQueryString();

        return view('admin_panel.register_users.index', compact('users'));
    }

    public function create()
    {
        return view('admin_panel.register_users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:15',
            'password' => 'required|min:6',
            'role' => 'required|in:User,Admin,Super Admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('index.users')->with('success', 'User added successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin_panel.register_users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'required|string|max:15',
            'role' => 'required|in:User,Admin,Super Admin',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
        ]);

        return redirect()->route('index.users')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // ------------------------------------------------------------------
        // FIXED (was: session('user_id'), which is never set anywhere in the
        // app, so this check never actually fired). Use the auth guard instead.
        // ------------------------------------------------------------------
        if (Auth::id() === $user->id) {
            // FIXED (was: route('admin.dashboard'), which doesn't exist in
            // your routes and would throw a RouteNotFoundException).
            return redirect()->route('index.users')->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        // FIXED (was: route('admin.dashboard'))
        return redirect()->route('index.users')->with('success', 'User deleted successfully!');
    }
}