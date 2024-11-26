<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet; // Import model Outlet


class OutletController extends Controller
{
    public function index()
    {
        // Data dummy outlet
        $outlets = [
            ['id' => 4, 'nama' => 'Kopi Kisah Manis Abdulrahman Saleh No. 56'],
            ['id' => 5, 'nama' => 'Kopi Kisah Manis Sunda No. 65'],
            ['id' => 6, 'nama' => 'Kopi Kisah Manis Dago Ir. H. Djuanda No. 98'],
        ];

        $outlets = Outlet::paginate(3); // Menampilkan 3 outlet per halaman

        return view('pilih-outlet', compact('outlets'));
    }


    public function show($id)
    {
        // Data dummy outlet dan menu/barista
        $data = [
            4 => [
                'id' => 4,
                'nama' => 'Kopi Kisah Manis Abdulrahman Saleh',
                'menu' => [
                    ['nama' => 'Americano', 'harga' => 25000],
                    ['nama' => 'Cappuccino', 'harga' => 25000],
                    ['nama' => 'Kopi Kisah Manis', 'harga' => 28000],
                    ['nama' => 'Kopi Kisah Asmara', 'harga' => 29000],
                    ['nama' => 'Goguma Ppang', 'harga' => 20000],
                ],
                'barista' => ['nama' => 'Budi Santoso'],
            ],
            5 => [
                'id' => 5,
                'nama' => 'Kopi Kisah Manis Sunda',
                'menu' => [
                    ['nama' => 'Americano', 'harga' => 25000],
                    ['nama' => 'Cappuccino', 'harga' => 25000],
                    ['nama' => 'Kopi Kisah Manis', 'harga' => 28000],
                    ['nama' => 'Kopi Kisah Asmara', 'harga' => 30000],
                    ['nama' => 'Goguma Ppang', 'harga' => 22000],
                    ['nama' => 'Nasi Goreng Kampung', 'harga' => 35000],
                    ['nama' => 'Nasi Goreng Kisah Manis', 'harga' => 38000],
                ],
                'barista' => ['nama' => 'Siti Aminah'],
            ],
            6 => [
                'id' => 6,
                'nama' => 'Kopi Kisah Manis Dago',
                'menu' => [
                    ['nama' => 'Americano', 'harga' => 25000],
                    ['nama' => 'Cappuccino', 'harga' => 25000],
                    ['nama' => 'Kopi Kisah Manis', 'harga' => 28000],
                    ['nama' => 'Kopi Kisah Asmara', 'harga' => 30000],
                    ['nama' => 'Goguma Ppang', 'harga' => 22000],
                    ['nama' => 'Nasi Goreng Kampung', 'harga' => 35000],
                    ['nama' => 'Nasi Goreng Kisah Manis', 'harga' => 38000],
                    ['nama' => 'Cheese Cake Strawberry', 'harga' => 35000],
                    ['nama' => 'Cheese Cake Blueberry', 'harga' => 38000],
                ],
                'barista' => ['nama' => 'Joko Prianto'],
            ],
        ];

        // Jika data tidak ditemukan
        if (!isset($data[$id])) {
            abort(404, 'Outlet not found');
        }

        return view('detail-outlet', ['outlet' => $data[$id]]);
    }
}
