<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $product->image,
                'description' => $product->description,
            )
        ));

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function index()
    {
        $cartItems = Cart::getContent();

        return view('cart', compact('cartItems'));
    }
    public function update(Request $request, $id)
    {
        Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function remove($id)
    {
        Cart::remove($id);
        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }
    public function clear()
    {
        // Clear the cart
        Cart::clear();

        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully');
    }
}
