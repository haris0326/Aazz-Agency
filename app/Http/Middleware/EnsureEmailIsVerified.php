<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $redirectToRoute = null)
    {
        // Check if the user is logged in, if the user's email is verified, or if email verification is required
        if (! $request->user() ||
            ($request->user() instanceof MustVerifyEmail && ! $request->user()->hasVerifiedEmail())) {
            // Redirect to the specified route or show verification notice if email is not verified
            return $request->expectsJson()
                        ? abort(403, 'Your email address is not verified.')
                        : Redirect::route($redirectToRoute ?: 'verification.notice');
        }

        return $next($request);
    }
}
