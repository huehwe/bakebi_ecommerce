<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->with('user')
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function view(Order $order)
    {
        $order->load(['user']);
        
        return view('admin.orders.view', [
            'order' => $order,
            'orderStatuses' => OrderStatus::cases(),
            'paymentStatuses' => PaymentStatus::cases(),
        ]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => ['required', 'string'],
            'payment_status' => ['required', 'string'],
        ]);

        $order->update($validated);

        return back()->with('success', 'Order status updated successfully');
    }
}