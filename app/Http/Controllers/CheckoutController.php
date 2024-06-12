<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::getContent();
        return view('checkout', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'apartment' => 'nullable|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'phone' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'email' => $validatedData['email'],
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'address' => $validatedData['address'],
            'apartment' => $validatedData['apartment'],
            'city' => $validatedData['city'],
            'postal_code' => $validatedData['postal_code'],
            'phone' => $validatedData['phone'],
            'payment_method' => $validatedData['payment_method'],
            'total' => Cart::getTotal(),
            'status' => 'Pending',
        ]);

        $cartItems = Cart::getContent();
        foreach ($cartItems as $item) {
            $order->products()->attach($item->id, [
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        Cart::clear();

        return redirect()->route('home')->with('success', 'Order placed successfully! Navigate to order listing to track your order.');
    }
}
