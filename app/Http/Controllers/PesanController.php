<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Models\Menu;
use App\Models\Outlet;
use App\Models\Pesan_Detail;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function create()
    {
        $menus = Menu::all();
        $outlet = Outlet::first(); // Atur sesuai kebutuhan
        return view('pesan.create', compact('menus', 'outlet'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'outlet_id' => 'required|exists:outlets,id',
            'nomor_meja' => 'required|integer',
            'nama' => 'required|string|max:255',
            'metode_pembayaran' => 'required|in:Cash,Credit,QRIS',
            'menu' => 'required|array',
            'menu.*.jumlah' => 'required|integer|min:1',
            'menu.*.harga' => 'required|numeric',
            'menu.*.nama' => 'required|string|max:255',
        ]);

        // Buat pesan baru
        $pesan = Pesan::create([
            'outlet_id' => $validated['outlet_id'],
            'nomor_meja' => $validated['nomor_meja'],
            'nama' => $validated['nama'],
            'metode_pembayaran' => $validated['metode_pembayaran'],
        ]);

        // Simpan setiap item pesan ke dalam pesan details
        foreach ($validated['menu'] as $menuId => $menu) {
            Pesan_Detail::create([
                'pesan_id' => $pesan->id,
                'menu_id' => $menuId,
                'jumlah' => $menu['jumlah'],
                'harga' => $menu['harga'],
            ]);
        }

        return redirect()->route('pesan.create')->with('success', 'Pesanan berhasil dibuat!');
    }
}
