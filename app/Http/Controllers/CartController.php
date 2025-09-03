<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
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

        return redirect()->to(url('/#menu'))->with('success', 'Produk ditambahkan ke keranjang!');
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

    // ✅ Tambahan untuk halaman order
    public function order()
    {
        $cart = Session::get('cart', []);

        // kalau cart kosong, balikin ke halaman cart
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong!');
        }

        return view('orderinfo', compact('cart'));
    }


    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Cart kosong');
        }

        // Simpan order
        $order = Order::create([
            'user_id' => auth()->id() ?? null, // kalau belum login, boleh null
            'note' => $request->note ?? null,
            'subtotal' => collect($cart)->sum(fn($i) => $i['price'] * $i['qty']),
        ]);

        // Simpan item order
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'qty' => $item['qty'],
                'price' => $item['price'],
            ]);
        }

        // Hapus cart dari session
        session()->forget('cart');

        // ✅ langsung ke halaman orderinfo
        return redirect()->route('order.info', $order->id);
    }

    public function info($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('orderinfo', compact('order'));
    }

    // public function payment()
    // {
    //     return view('payment');
    // }

    public function payment()
    {
        // cari order terakhir user login
        $order = Order::where('user_id', auth()->id())->latest()->first();

        if (!$order) {
            return redirect()->route('cart.index')->with('error', 'Belum ada pesanan.');
        }

        // ambil itemnya
        $orderItems = OrderItem::where('order_id', $order->id)->with('product')->get();

        return view('payment', compact('order', 'orderItems'));
    }
}
