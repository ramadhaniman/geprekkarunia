<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart', compact('cart'));
    }

    // Tambah ke cart
    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'product_id' => $product->id,
                'name' => $product->title,
                'price' => $product->price,
                'qty' => 1
            ];
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    // Langsung beli → clear cart lalu tambahkan 1 produk
    public function buy($id)
    {
        $product = Product::findOrFail($id);

        $cart = [];
        $cart[$id] = [
            'product_id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'qty' => 1
        ];

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk siap dibeli!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['qty'] = (int) $request->qty; // update qty
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Quantity updated!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed!');
    }
}
