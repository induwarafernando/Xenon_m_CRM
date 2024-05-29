<?php
// app/Http/Middleware/EnsureUserIsMerchandizer.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsMerchandizer
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'merchandizer') {
            return $next($request);
        }

        return redirect('/'); // Redirect to homepage or other unauthorized page
    }
}
