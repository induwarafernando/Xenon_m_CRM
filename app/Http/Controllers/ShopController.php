<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // Eager load the category relationship
        $products = Product::with('category')->get();

        return view('shop', compact('products'));
    }
}
