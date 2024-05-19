<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class ProductDetailController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product-detail', compact('product'));

        
        // Fetching cart items for the current user
        $cartItems = Cart::session(auth()->id())->getContent();

        return view('product-detail', compact('product', 'cartItems'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function cartIndex()
    {
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('cart', compact('cartItems'));
    }
}
