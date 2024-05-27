<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;


class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalProducts = Product::count();
        $totalCustomers = User::where('role', 'customer')->count();
        $totalMerchandizers = User::where('role', 'merchandizer')->count();

        return view('dashboard', compact('totalProducts', 'totalCustomers', 'totalMerchandizers'));
    }
}
