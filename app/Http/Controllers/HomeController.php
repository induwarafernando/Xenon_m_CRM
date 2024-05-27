<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Enums\Role;

class HomeController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        $user = auth()->user();
        
        // If user is authenticated and is a customer (role 2), redirect to home
        // dd($user->role);
        if ($user) {
            if ($user->role == Role::Customer) {
                return view('home', [
                    'product' => Product::find(1) // Example: find a product with ID 1
                ]);
            } else {
                return view('dashboard');
            }
        }

        // Redirect to home for unauthenticated users
        return view('home', [
            'product' => Product::find(1) // Example: find a product with ID 1
        ]);
    }
}
