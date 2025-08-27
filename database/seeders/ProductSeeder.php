<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => 'Ayam Geprek',
            'image' => 'Asset/Ayam Geprek.jpeg',
            'description' => 'Ayam goreng crispy yang digeprek hingga renyah, dipadukan dengan sambal pedas gurih yang menggugah selera. Disajikan dengan nasi putih hangat, lengkap dengan lalapan selada dan irisan tomat segar.',
            'price' => '24000',
        ]);

        Product::create([
            'title' => 'Pecel Lele',
            'image' => 'Asset/Pecel Lele.jpeg',
            'description' => 'Lele goreng renyah dengan daging lembut di dalamnya, disajikan hangat bersama nasi putih pulen, lalapan segar, tahu tempe goreng, kerupuk gurih, dan sambal pedas yang bikin nagih.',
            'price' => '22000',
        ]);

        Product::create([
            'title' => 'Es Teh Manis',
            'image' => 'Asset/Es Teh.jpg',
            'description' => 'Minuman yang selalu jadi favorit, teh pilihan disajikan dingin dengan es batu melimpah. Rasa manis yang pas berpadu dengan kesegaran teh, cocok jadi teman makan dan penghilang dahaga.',
            'price' => '5000',
        ]);
    }
}
