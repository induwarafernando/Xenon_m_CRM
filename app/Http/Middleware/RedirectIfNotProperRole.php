<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotProperRole
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user->role == 1 || $user->role == 3 || $user->role == 4) {
            return redirect()->route('dashboard');
        } elseif ($user->role == 2) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
