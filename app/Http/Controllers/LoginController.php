<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login requests.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Redirect based on role
            if (in_array($user->role, ['Admin', 'Super Admin'])) {
                return redirect()->route('admin.panel')->with('success', "Welcome, {$user->role}!");
            }

            Auth::logout(); // Prevent other roles from proceeding
            return redirect()->route('login')->with('error', 'Access restricted to Admins and Super Admins.');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->except('password'));
    }

    /**
     * Handle logout requests.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
