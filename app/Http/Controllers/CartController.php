<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
{
    $cartItems = Session::get('cart', []);
    $totalPrice = array_sum(array_column($cartItems, 'price'));

    return view('cart', compact('cartItems', 'totalPrice'));
}

    public function addToCart($id)
    {
        // Retrieve the meal data from the API
        $response = Http::withOptions(['verify' => false])->get('https://www.themealdb.com/api/json/v1/1/lookup.php', ['i' => $id]);
        $data = $response->json();
        $meal = $data['meals'][0];

        // Add the meal to the cart
        $cart = Session::get('cart', []);
        $cart[] = [
            'id' => $meal['idMeal'],
            'name' => $meal['strMeal'],
            'image' => $meal['strMealThumb'],
            'description' => $meal['strInstructions'],
            'price' => rand(1, 10) * 5000,
        ];
        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Makanan berhasil ditambahkan ke keranjang.');
    }

    public function removeFromCart($index)
    {
        // Remove the meal from the cart
        $cart = Session::get('cart', []);
        if (isset($cart[$index])) {
            unset($cart[$index]);
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Makanan berhasil dihapus dari keranjang.');
    }
}
