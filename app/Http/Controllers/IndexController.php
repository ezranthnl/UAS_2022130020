<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // Data dummy untuk menu
        $menus = [
            (object) [
                'nama' => 'Kopi Hitam',
                'deskripsi' => 'Kopi hitam yang kuat dan menyegarkan.',
                'harga' => 25000,
                'gambar' => 'americano.jpeg',
            ],
            (object) [
                'nama' => 'Kopi Susu',
                'deskripsi' => 'Kopi susu manis yang cocok untuk segala suasana.',
                'harga' => 28000,
                'gambar' => 'kopisusu.jpeg',
            ],
            (object) [
                'nama' => 'Cappuccino',
                'deskripsi' => 'Kombinasi sempurna antara kopi dan susu berbusa.',
                'harga' => 25000,
                'gambar' => 'cappucino.jpg',
            ],
            (object) [
                'nama' => 'Matcha',
                'deskripsi' => 'Racikan GreenTea Powder yang Berkualitas.',
                'harga' => 28000,
                'gambar' => 'matcha.jpeg',
            ],
            (object) [
                'nama' => 'Goguma Pang',
                'deskripsi' => 'Roti Ubi Yang Berisi Keju Mozarella Di Dalamnya.',
                'harga' => 20000,
                'gambar' => 'gogumapang.jpg',
            ],
            (object) [
                'nama' => 'Chicken Wings',
                'deskripsi' => 'Potongan Sayap Ayam Crispy Dengan Garlic Mayo Dan Baluran Spicy Mayo diatasnya.',
                'harga' => 32000,
                'gambar' => 'chickenwings.jpg',
            ]
        ];

        $pegawais = [
            (object) [
                'nama' => 'Arief Syab',
                'jabatan' => 'Head Bar',
                'gambar' => 'masarip.png',
            ],
            (object) [
                'nama' => 'Fikri R',
                'jabatan' => 'Barista',
                'gambar' => 'toweng.png',
            ],
            (object) [
                'nama' => 'Dzulfi',
                'jabatan' => 'Barista',
                'gambar' => 'julpi.png',
            ]
        ];




        // Kirim data menu ke view
        return view('welcome', compact('menus', 'pegawais'));
    }
}
