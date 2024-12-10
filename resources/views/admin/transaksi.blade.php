@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Data Transaksi</h1>

    <h2 class="mb-3">Merchandise Sales</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Customer ID</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @forelse($merchandise_sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->product_id }}</td>
                    <td>{{ $sale->customer_id }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->total_price }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada pembelian.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <h2 class="mb-3">ORDERAN (masih error)</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Outlet ID</th>
                <th>No Meja</th>
                <th>Nama</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->outlet_id }}</td>
                    <td>{{ $order->nomor_meja }}</td>
                    <td>{{ $order->nama_pelanggan }}</td>
                    <td>{{ $order->total_harga }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada orderan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <h2 class="mb-3">Reservasi Meja</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Meja</th>
                <th>User ID</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->table_id }}</td>
                    <td>{{ $reservation->user_id }}</td>
                    <td>{{ $reservation->reservation_time }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada reservasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
