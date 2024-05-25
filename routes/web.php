<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MerchandizerController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;


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

Route::get('/', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    // 'super.admin'
])->group(function () {


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/product/{id}', [ProductDetailController::class, 'show'])->name('product.detail');
    Route::resource('product_category', App\Http\Controllers\ProductCategoryController::class);
    Route::get('/product_category/create', [ProductCategoryController::class, 'create'])->name('product_category.create');
    Route::resource('user', App\Http\Controllers\UserController::class);

});


Route::get('/product-detail/{id}', [ProductDetailController::class, 'show'])->name('product-detail');
Route::post('/add-to-cart/{id}', [ProductDetailController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [ProductDetailController::class, 'cartIndex'])->name('cart.index');


Route::get('/', [HomeController::class, 'index'])->name('home');


// Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/merchandizers', \App\Http\Controllers\Admin\MerchandizerController::class);
// });

// Route::middleware('super.admin')->group(function () {
//     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// });


Route::get('/merchandizer-register', [RegisterController::class, 'showRegistrationForm'])->name('merchandizer-register');
Route::post('/merchandizer-register', [RegisterController::class, 'create'])->name('merchandizer-registration');
