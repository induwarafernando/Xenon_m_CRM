<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    public function store(LoginRequest $request, LoginResponseContract $response)
    {
        // Authenticate the user using Fortify's built-in method
        if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return back()->withErrors([
                'email' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role == 1 || $user->role == 3 || $user->role == 4) {
            return redirect()->route('dashboard');
        } elseif ($user->role == 2) {
            return redirect()->route('home');
        }

        return $response->toResponse($request);
    }
}
