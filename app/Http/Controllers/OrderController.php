<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create($id)
    {
        // Data dummy menu untuk outlet
        $menu = [
            ['nama' => 'Kopi Hitam', 'harga' => 15000],
            ['nama' => 'Cappuccino', 'harga' => 25000],
        ];

        return view('order.create', ['outlet_id' => $id, 'menu' => $menu]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nomor_meja' => 'required|integer',
            'nama' => 'required|string|max:255',
            'metode_pembayaran' => 'required|in:Cash,Credit,QRIS',
            'menu' => 'required|array',
            'menu.*.nama' => 'required|string',
            'menu.*.jumlah' => 'required|integer|min:1',
            'menu.*.harga' => 'required|numeric',
        ]);

        // Hitung total harga
        $total_harga = 0;
        foreach ($validated['menu'] as $item) {
            $total_harga += $item['jumlah'] * $item['harga'];
        }

        // Masukkan data ke dalam database menggunakan transaksi
        DB::transaction(function () use ($validated, $total_harga) {
            // Menyimpan data ke tabel orders
            $orderId = DB::table('orders')->insertGetId([
                'nomor_meja' => $validated['nomor_meja'],
                'nama' => $validated['nama'],
                'metode_pembayaran' => $validated['metode_pembayaran'],
                'total_harga' => $total_harga,
            ]);

            // Menyimpan data menu ke tabel order_details
            foreach ($validated['menu'] as $item) {
                DB::table('order_details')->insert([
                    'order_id' => $orderId,
                    'menu' => $item['nama'],
                    'jumlah' => $item['jumlah'],
                    'harga' => $item['harga'],
                ]);
            }
        });

        // Redirect ke halaman 'Pilih Outlet' dengan pesan sukses
        return redirect()->route('pilih-outlet')->with('success', 'Pesanan berhasil dibuat!');
    }
}
