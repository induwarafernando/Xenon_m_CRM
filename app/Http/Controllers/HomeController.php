<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::find(1); // Example: find a product with ID 1
        return view('home', compact('product'));
    }
}
