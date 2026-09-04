<?php

// app/Http/Middleware/CheckAuthenticated.php

// app/Http/Middleware/CheckAuthenticated.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Check if the user is an admin or super admin
        if (!in_array(Auth::user()->role, ['Admin', 'Super Admin'])) {
            return redirect()->route('home')->with('error', 'Access restricted to Admins and Super Admins.');
        }

        return $next($request);
    }
}

