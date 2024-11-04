<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Helpers\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $user = $request->user();
        $cartItems = Cart::getCartItems();
        
        // Calculate total
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['quantity'] * $item['price'];
        }

        // Create order
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $total,
            'status' => OrderStatus::Pending,
            'payment_status' => PaymentStatus::Pending
        ]);

        // Clear cart after order creation
        Cart::clear();

        return redirect()->route('cart.checkout.success', $order);
    }

    public function success(Order $order)
    {
        return view('cart.checkout-success', compact('order'));
    }

    public function failure()
    {
        return view('cart.checkout-failure');
    }
}