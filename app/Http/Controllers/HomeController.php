<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimony;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {

        $testimonies = Testimony::all();
        $products = Product::all();

        // return view('home', compact('testimonials'),);
        return view('home', compact('products', 'testimonies'));
    }

    public function store(Request $request)
    {
        Product::create([
            'title' => $request->name,
            'image' => 'Asset/'.$request->image,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $products = Product::all();

        // return view('home', compact('products'));
        // return redirect()->route('home')->with('success', 'Produk berhasil ditambahkan');
        return back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function dashboard()
    {
        $products = Product::all();
        return view('dashboardadmin', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('editproduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'title' => $request->title,
            'image' => $request->image,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('dashboard')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('dashboard')->with('success', 'Produk berhasil dihapus');
    }
}
