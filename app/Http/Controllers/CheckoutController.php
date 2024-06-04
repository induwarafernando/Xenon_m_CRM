<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function show()
    {
        return view('checkout');
    }

    public function store(Request $request)
    {
        // Validate and store the order details
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
            'total' => 'required|numeric',
        ]);

        $order = Order::create($validatedData);

        // Handle payment confirmation logic here

        return redirect()->route('checkout.show')->with('success', 'Order placed successfully!');
    }
}
