<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Import Log facade

class CheckSuperAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Log that the middleware is being triggered
        Log::info('CheckSuperAdmin middleware triggered.');

        if (!Auth::check() || Auth::user()->role !== 'Super Admin') {
            Log::warning('Access denied: User is not a super admin.');
            return redirect()->route('home')->with('error', 'Access restricted to Super Admins only.');
        }

        Log::info('User is a super admin. Access granted.');
        return $next($request);
    }
}

