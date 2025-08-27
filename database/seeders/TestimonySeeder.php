<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimony::create([
            'image' => 'Asset/user1.png',
            'testimony' => 'Ayam gepreknya enak banget! Dagingnya empuk, sambalnya pedas bikin nagih. Porsinya pas banget buat makan siang.',
            'name' => 'Rizal',
            'job' => 'Karyawan Swasta',
        ]);

        Testimony::create([
            'image' => 'Asset/user2.png',
            'testimony' => 'Saya sudah coba banyak tempat makan ayam geprek, tapi di sini rasanya beda. Gurihnya pas, sambalnya mantap, dan pelayanannya juga cepat dan ramah!',
            'name' => 'Riana',
            'job' => 'Mahasiswi',
        ]);

        Testimony::create([
            'image' => 'Asset/user3.png',
            'testimony' => 'Pecel lelenya luar biasa! Lele digoreng sampai renyah di luar tapi tetap lembut di dalam. Sambal dan lalapannya segar banget, cocok buat makan malam.',
            'name' => 'Gilang',
            'job' => 'Karyawan Swasta',
        ]);

        Testimony::create([
            'image' => 'Asset/user4.png',
            'testimony' => 'Ayam geprek di sini sudah jadi langganan. Pedasnya bisa pilih level, jadi cocok buat semua orang. Rasanya konsisten dan sambelnya bikin melek!',
            'name' => 'Yuda',
            'job' => 'Karyawan Swasta',
        ]);
        
    }
}
