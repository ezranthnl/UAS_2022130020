<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Outlet;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function create($id)
    {
        $outlet = Outlet::findOrFail($id);
        $menus = Menu::where('outlet_id', $id)->get();
        return view('order.create', compact('outlet', 'menus'));
    }

    public function preview(Request $request)
    {
        Log::info('Preview Method Called', $request->all());

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
        $total = 0;
        foreach ($validated['menu'] as $menuId => $menu) {
            $total += $menu['harga'] * $menu['jumlah'];
            $validated['menu'][$menuId]['id'] = $menuId;
        }



        Log::info('Validated Order Data', $validated);
        return view('order.preview', ['data' => $validated, 'total' => $total]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'outlet_id' => 'required|integer',
            'nomor_meja' => 'required|integer',
            'nama' => 'required|string|max:255',
            'metode_pembayaran' => 'required|string',
            'menu' => 'required|array',
            'menu.*.id' => 'required|integer',
            'menu.*.jumlah' => 'required|integer|min:1',
            'menu.*.harga' => 'required|integer',
        ]);

        $order = Order::create([
            'outlet_id' => $validated['outlet_id'],
            'nomor_meja' => $validated['nomor_meja'],
            'nama' => $validated['nama'],
            'metode_pembayaran' => $validated['metode_pembayaran'],
            'total_harga' => array_reduce($validated['menu'], function ($carry, $item) {
                return $carry + ($item['jumlah'] * $item['harga']);
            }, 0),
        ]);

        foreach ($validated['menu'] as $menuId => $menu) {
            OrderDetail::create([
                'order_id' => $order->id,
                'menu_id' => $menu['id'],
                'jumlah' => $menu['jumlah'],
                'harga' => $menu['harga'],
            ]);
        }

        return redirect()->route('order.create', ['id' => $validated['outlet_id']])->with('success', 'Order berhasil dibuat!');
    }
}
