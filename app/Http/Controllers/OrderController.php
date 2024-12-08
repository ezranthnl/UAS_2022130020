<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Outlet;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
            'nama_pelanggan' => 'required|string|max:255',
            'metode_pembayaran' => 'required|in:Cash,Credit,QRIS',
            'menu' => 'required|array',
            'menu.*.jumlah' => 'required|integer|min:1',
            'menu.*.harga' => 'required|numeric',
            'menu.*.nama' => 'required|string|max:255',
        ]);

        $total = array_reduce($validated['menu'], function ($carry, $item) {
            return $carry + ($item['harga'] * $item['jumlah']);
        }, 0);

        Log::info('Validated Order Data', $validated);
        return view('order.preview', ['data' => $validated, 'total' => $total]);
    }


    public function store(Request $request)
    {
        Log::info('Store Method Called', $request->all());

        $validated = $request->validate([
            'outlet_id' => 'required|integer',
            'nomor_meja' => 'required|integer',
            'nama_pelanggan' => 'required|string|max:255',
            'metode_pembayaran' => 'required|string',
            'menu' => 'required|array',
            'menu.*.id' => 'required|integer',
            'menu.*.jumlah' => 'required|integer|min:1',
            'menu.*.harga' => 'required|integer',
        ]);

        Log::info('Validated Store Data', $validated);

        DB::transaction(function () use ($validated) {
            try {
                Log::info('Starting Transaction');

                $order = Order::create([
                    'outlet_id' => $validated['outlet_id'],
                    'nomor_meja' => $validated['nomor_meja'],
                    'nama_pelanggan' => $validated['nama_pelanggan'],
                    'metode_pembayaran' => $validated['metode_pembayaran'],
                    'total_harga' => array_reduce($validated['menu'], function ($carry, $item) {
                        return $carry + ($item['jumlah'] * $item['harga']);
                    }, 0),
                ]);
                Log::info('Order Created', ['order_id' => $order->id]);

                foreach ($validated['menu'] as $menuId => $menu) {
                    if ($menu['jumlah'] > 0) {
                        OrderDetail::create([
                            'order_id' => $order->id,
                            'menu_id' => $menu['id'],
                            'jumlah' => $menu['jumlah'],
                            'harga' => $menu['harga'],
                        ]);
                        Log::info('Order Detail Created', ['order_id' => $order->id, 'menu_id' => $menu['id']]);
                    }
                }

                Log::info('Transaction Committed');
            } catch (\Exception $e) {
                Log::error('Error Creating Order', ['error' => $e->getMessage()]);
                throw $e;
            }
        });

        return redirect()->route('order.create', ['id' => $validated['outlet_id']])->with('success', 'Order berhasil dibuat!');
    }
}
