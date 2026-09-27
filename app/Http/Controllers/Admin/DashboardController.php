<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $totalOrders = Order::count();

        $totalBuyers = User::where('role', 'buyer')->count();

        $pendingOrders = Order::where('status', 'menunggu pembayaran')->count();

        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();
        $newOrderCount = Order::where('status', 'menunggu pembayaran')->count();

        $newOrders = Order::with('user')
        ->where('status', 'menunggu pembayaran')
        ->latest()
        ->take(5)
        ->get();
        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'totalBuyers',
            'pendingOrders',
            'recentOrders',
            'newOrderCount',
            'newOrders'
        ));
    }
}