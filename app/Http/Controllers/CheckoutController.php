<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use Darryldecode\Cart\Facades\CartFacade as Cart;


class CheckoutController extends Controller
{
    public function index()
    {
        // Retrieve cart items
        $cartItems = Cart::getContent();

        // Pass cart items to the view
        return view('checkout', compact('cartItems'));
    }

    public function show()
    {
        // You can add any necessary logic here, like fetching cart items
        $cartItems = Cart::getContent();
        $total = Cart::getTotal();

        // Pass data to the checkout view
        return view('checkout', compact('cartItems', 'total'));
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

    public function placeOrder(Request $request)
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

    // Create the order
    $order = Order::create($validatedData);

    // Clear the cart
    Cart::clear();

    // Redirect to home with success message
    return redirect()->route('home')->with('success', 'Order placed successfully! Navigate to order listing to track your order.');
}

}
