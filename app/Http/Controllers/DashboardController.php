<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalCustomers = User::where('role', '2')->count();
        $totalMerchandizers = User::where('role', '3')->count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalSales = Order::sum('total');

        $orders = Order::select('id', 'total')->get();
        $orderNumbers = $orders->pluck('id')->toArray();
        $orderTotals = $orders->pluck('total')->toArray();

        return view('dashboard', compact('totalCustomers', 'totalMerchandizers', 'totalProducts', 'totalOrders', 'totalSales', 'orderNumbers', 'orderTotals'));
    }
}
