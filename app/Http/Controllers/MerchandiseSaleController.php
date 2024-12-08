<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MerchandiseSale;
use App\Models\Product;
use App\Models\Customer;

class MerchandiseSaleController extends Controller
{
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('merchandise_sales.create', compact('products', 'customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        $merchandiseSale = MerchandiseSale::create([
            'product_id' => $validated['product_id'],
            'customer_id' => $validated['customer_id'],
            'quantity' => $validated['quantity'],
            'total_price' => $validated['total_price'],
        ]);

        return redirect()->route('merchandise-sales.create')->with('success', 'Merchandise sale recorded successfully!');
    }
}
