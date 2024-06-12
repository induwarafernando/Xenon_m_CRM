<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MerchandizerController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PayPalController;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authenticated Routes
Route::get('/home', [HomeController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/redirect', function () {
    return redirect()->route('role.redirect');
})->name('login.redirect');

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/product-detail/{id}', [ProductDetailController::class, 'show'])->name('product.detail');
Route::post('/add-to-cart/{id}', [ProductDetailController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [ProductDetailController::class, 'cartIndex'])->name('cart.index');

// Registration Routes
Route::get('/merchandizer-register', [RegisterController::class, 'showRegistrationForm'])->name('merchandizer-register');
Route::post('/merchandizer-register', [RegisterController::class, 'create'])->name('merchandizer-registration');

// Login Route to ensure it goes through AuthenticatedSessionController
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');


// Product Category Routes
Route::resource('product_category', ProductCategoryController::class);
Route::get('/product_category/create', [ProductCategoryController::class, 'create'])->name('product_category.create');

// User Routes
Route::resource('user', App\Http\Controllers\UserController::class);

// Admin Routes
Route::resource('admin/merchandizers', MerchandizerController::class);

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

Route::middleware(['auth', 'merchandizer'])->group(function () {
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
});

//product create blade
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
//products list blade
Route::get('admin/products/list', [ProductController::class, 'list'])->name('products.list');
Route::get('admin/products', [ProductController::class, 'index'])->name('products.index');
//destroy product
Route::delete('admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
//edit product
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
//update product
Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
//checkout
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');




Route::post('/paypal/payment', [PayPalController::class, 'createPayment'])->name('paypal.create');
Route::get('/paypal/payment/execute', [PayPalController::class, 'executePayment'])->name('paypal.execute');
Route::get('/paypal/payment/cancel', [PayPalController::class, 'cancelPayment'])->name('paypal.cancel');

Route::get('/cart/items', function() {
    $cartItems = Cart::getContent();
    $total = Cart::getTotal(); // Adjust according to your needs (use total, subtotal, etc.)

    $items = $cartItems->map(function ($item) {
        return [
            'name' => $item->name,
            'quantity' => $item->quantity,
            'price' => $item->price
        ];
    });

    return response()->json(['items' => $items, 'total' => $total]);
})->name('cart.items');

Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');
Route::post('/orders', [OrderController::class, 'store'])->name('orders');


Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.details');
Route::get('/orders/{id}/track', [OrderController::class, 'track'])->name('order.track');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');


//customer order-listing route
Route::get('/order-listing', [OrderController::class, 'list'])->name('order-listing');

Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::post('/admin/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
//orders.list
Route::get('/admin/orders/list', [OrderController::class, 'list'])->name('admin.orders.list');