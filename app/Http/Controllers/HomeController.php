<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = [
            [
                'foto' => 'Asset/user1.png',
                'nama' => 'Rizal',
                'pekerjaan' => 'Karyawan Swasta',
                'pesan' => 'Ayam gepreknya enak banget! Dagingnya empuk, sambalnya pedas bikin nagih. Porsinya pas banget buat makan siang.',
            ],
            [
                'foto' => 'Asset/user2.png',
                'nama' => 'Riana',
                'pekerjaan' => 'Mahasiswi',
                'pesan' => 'Saya sudah coba banyak tempat makan ayam geprek, tapi di sini rasanya beda. Gurihnya pas, sambalnya mantap, dan pelayanannya juga cepat dan ramah!',
            ],
            [
                'foto' => 'Asset/user3.png',
                'nama' => 'Gilang',
                'pekerjaan' => 'Karyawan Swasta',
                'pesan' => 'Pecel lelenya luar biasa! Lele digoreng sampai renyah di luar tapi tetap lembut di dalam. Sambal dan lalapannya segar banget, cocok buat makan malam.',
            ],
            [
                'foto' => 'Asset/user4.png',
                'nama' => 'Yuda',
                'pekerjaan' => 'Karyawan Swasta',
                'pesan' => 'Ayam geprek di sini sudah jadi langganan. Pedasnya bisa pilih level, jadi cocok buat semua orang. Rasanya konsisten dan sambelnya bikin melek!',
            ],
        ];

        return view('home', compact('testimonials'));
    }
}
