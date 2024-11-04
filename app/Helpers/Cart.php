<?php


namespace App\Helpers;


use App\Models\CartItem;
use App\Models\Product; 
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Arr;

/**
 * Class Cart
 * @package App\Helpers
 */
class Cart
{
    public static function getCartItemsCount(): int
    {
        $request = \request();
        $user = $request->user();
        if ($user) {
            return CartItem::where('user_id', $user->id)->sum('quantity');
        } else {
            $cartItems = self::getCookieCartItems();

            return array_reduce(
                $cartItems,
                fn($carry, $item) => $carry + $item['quantity'],
                0
            );
        }
    }

    public static function getCartItems()
    {
        $request = \request();
        $user = $request->user();
        if ($user) {
            return CartItem::where('user_id', $user->id)->get()->map(
                fn($item) => ['product_id' => $item->product_id, 'quantity' => $item->quantity]
            );
        } else {
            return self::getCookieCartItems();
        }
    }

    public static function getCookieCartItems()
    {
        $request = \request();
        return json_decode($request->cookie('cart_items', '[]'), true);
    }

    public static function getCountFromItems($cartItems)
    {
        return array_reduce(
            $cartItems,
            fn($carry, $item) => $carry + $item['quantity'],
            0
        );
    }

    public static function moveCartItemsIntoDb()
    {
        $request = \request();
        $cartItems = self::getCookieCartItems();
        $dbCartItems = CartItem::where(['user_id' => $request->user()->id])->get()->keyBy('product_id');
        $newCartItems = [];
        foreach ($cartItems as $cartItem) {
            if (isset($dbCartItems[$cartItem['product_id']])) {
                continue;
            }
            $newCartItems[] = [
                'user_id' => $request->user()->id,
                'product_id' => $cartItem['product_id'],
                'quantity' => $cartItem['quantity'],
            ];
        }

        if (!empty($newCartItems)) {
            CartItem::insert($newCartItems);
        }
    }
    public static function getProductsAndCartItems(): array|\Illuminate\Database\Eloquent\Collection
    {
        $cartItems = self::getCartItems();
        $ids = Arr::pluck($cartItems, 'product_id');
        $products = Product::query()->whereIn('id', $ids)->get();
        $cartItems = Arr::keyBy($cartItems, 'product_id');

        return [$products, $cartItems];
    }
    public static function getCartTotal()
{
    $cartItems = self::getCartItems();
    $total = 0;

    foreach ($cartItems as $item) {
        $product = Product::find($item['product_id']);
        $total += $product->price * $item['quantity'];
    }

    return $total;
}
    public static function clear()
    {
        $user = auth()->user();
    if ($user) {
        CartItem::where('user_id', $user->id)->delete();
    } else {
        Cookie::queue('cart_items', json_encode([]), -1);
    }
}
}
