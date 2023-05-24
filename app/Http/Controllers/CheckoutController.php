<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Session::get('cart', []);
        $meals = [];

        foreach ($cartItems as $item) {
            $meals[] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'image' => $item['image'],
                'description' => $item['description'],
                'price' => $item['price'],
            ];
        }

        $totalPrice = array_sum(array_column($meals, 'price'));

        return view('checkout', compact('meals', 'totalPrice'));
    }

    public function placeOrder()
    {
        // Logic to place the order

        // Clear the cart
        Session::forget('cart');

        return redirect()->route('checkout.success')->with('success', 'Pesanan berhasil ditempatkan!');
    }

    public function checkoutSuccess()
    {
        return view('checkout_success');
    }
}
