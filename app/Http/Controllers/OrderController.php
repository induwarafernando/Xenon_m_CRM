<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Product;


class OrderController extends Controller
{
   
    public function index()
    {
        $orders = Order::with('products')->get(); // Eager load products
        return view('admin.orders.list', compact('orders'));
    }

      // Create the list method if it doesn't exist
      public function list()
      {

        $orders = Order::all();

          // Your logic here
          return view('admin.orders.list', compact('orders'));
      }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order status updated successfully!');
    }


    public function show($id)
    {
        $order = Order::with('products')->findOrFail($id);
        return view('order-details', compact('order'));
    }

    public function track($id)
    {
        $order = Order::findOrFail($id);
        // Implement tracking logic
        return view('order-track', compact('order'));
    }

    public function placeOrder(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'phone' => 'required|string',
        ]);

        // Create the order
        $order = Order::create([
            'user_id' => auth()->id(), // Assuming user is authenticated
            'email' => auth()->user()->email, // Assuming user is authenticated and has an 'email' field
            'payment_method' => 'Cash on Delivery', // You can change this to 'PayPal', 'Stripe', etc. based on your payment method
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'postal_code' => $validatedData['postal_code'],
            'phone' => $validatedData['phone'],
            'total' => Cart::getTotal(),
            'status' => 'Pending', // Set initial status
        ]);

        // Attach products to the order
        $cartItems = Cart::getContent();
        foreach ($cartItems as $item) {
            $order->products()->attach($item->id, [
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // Clear the cart
        Cart::clear();

        // Redirect to the order listing page with a success message
        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }
}
