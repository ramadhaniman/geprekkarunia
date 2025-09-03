<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'recipient' => 'required|string|max:255',
            'address' => 'required|string',
            'delivery_method' => 'required|string',
        ]);

        // Simpan ke session
        session([
            'orderinfo' => [
                'user_name' => auth()->user()->name,
                'user_email' => auth()->user()->email,
                'recipient' => $request->recipient,
                'address' => $request->address,
                'note' => $request->note,
                'delivery_method' => $request->delivery_method,
            ]
        ]);

        return redirect()->route('payment.checkout')->with('success', 'Order info disimpan di session!');
    }
}
