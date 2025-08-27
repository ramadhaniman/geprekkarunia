<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimony;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // $testimonials = [
        //     [
        //         'foto' => 'Asset/user1.png',
        //         'nama' => 'Rizal',
        //         'pekerjaan' => 'Karyawan Swasta',
        //         'pesan' => 'Ayam gepreknya enak banget! Dagingnya empuk, sambalnya pedas bikin nagih. Porsinya pas banget buat makan siang.',
        //     ],
        //     [
        //         'foto' => 'Asset/user2.png',
        //         'nama' => 'Riana',
        //         'pekerjaan' => 'Mahasiswi',
        //         'pesan' => 'Saya sudah coba banyak tempat makan ayam geprek, tapi di sini rasanya beda. Gurihnya pas, sambalnya mantap, dan pelayanannya juga cepat dan ramah!',
        //     ],
        //     [
        //         'foto' => 'Asset/user3.png',
        //         'nama' => 'Gilang',
        //         'pekerjaan' => 'Karyawan Swasta',
        //         'pesan' => 'Pecel lelenya luar biasa! Lele digoreng sampai renyah di luar tapi tetap lembut di dalam. Sambal dan lalapannya segar banget, cocok buat makan malam.',
        //     ],
        //     [
        //         'foto' => 'Asset/user4.png',
        //         'nama' => 'Yuda',
        //         'pekerjaan' => 'Karyawan Swasta',
        //         'pesan' => 'Ayam geprek di sini sudah jadi langganan. Pedasnya bisa pilih level, jadi cocok buat semua orang. Rasanya konsisten dan sambelnya bikin melek!',
        //     ],
        // ];

        $testimonies = Testimony::all();
        $products = Product::all();

        // return view('home', compact('testimonials'),);
        return view('home', compact('products', 'testimonies'));
    }

    public function store(Request $request)
    {
        Product::create([
            'title' => $request->name,
            'image' => $request->image,
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
