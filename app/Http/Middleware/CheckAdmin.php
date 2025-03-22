<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/login')->withErrors(['unauthenticated' => 'Please login first']);
        }

        // Check if the authenticated user's role is 'Admin'
        if (Auth::user()->role !== 1) {
            return redirect(Auth::user()->role); // ->with('error', 'You are not authorized to access this page.');
        }

        // If the user is an admin, proceed with the request
        return $next($request);
    }
}
