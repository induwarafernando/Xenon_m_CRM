<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class AuthenticatedSessionController extends Controller
{
    public function store(LoginRequest $request, LoginResponseContract $response)
    {
        $request->authenticate();

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
