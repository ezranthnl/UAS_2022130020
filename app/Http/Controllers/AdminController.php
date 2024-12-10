<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Order;
use App\Models\MerchandiseSale;
use App\Models\Menu;
use App\Models\Pegawai;
use App\Models\Product;
use App\Models\Outlet;
use App\Models\User;
use App\Models\Customer;
use App\Models\Table;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $reservations = Reservation::all();
        $orders = Order::all();
        $merchandise_sales = MerchandiseSale::all();
        $menus = Menu::all();
        $pegawais = Pegawai::all();
        $outlets = Outlet::all();
        $products = Product::all();
        $users = User::all();
        $customers = Customer::all();
        $tables = Table::all();


        return view('admin.index', compact('tables','customers','reservations', 'orders', 'merchandise_sales', 'menus', 'pegawais','outlets', 'products', 'users'));
    }

    public function showTransactions()
    {
        $reservations = Reservation::all();
        $orders = Order::all();
        $merchandise_sales = MerchandiseSale::all();

        return view('admin.transaksi', compact('reservations', 'orders', 'merchandise_sales'));
    }


    public function showData()
    {
        $menus = Menu::all();
        $pegawais = Pegawai::all();
        $outlets = Outlet::all();
        $products = Product::all();
        $users = User::all();

        return view('admin.data', compact('menus', 'pegawais', 'outlets', 'products', 'users'));
    }
}
