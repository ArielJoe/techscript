<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\RoleEnum;

class CheckKaprodi
{

    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/login')->withErrors(['unauthenticated' => 'Please login first']);
        }

        // Check if the authenticated user's role is 'Kaprodi'
        if (Auth::user()->role !== 2) {
            return redirect(RoleEnum::from(Auth::user()->role)->label()); // ->with('error', 'You are not authorized to access this page.');
        }

        // If the user is an Kaprodi, proceed with the request
        return $next($request);
    }
}
