@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Dashboard Admin</h1>

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
    <h2 class="mb-3">Product Merchandise</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada Product.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <h2 class="mb-3">Customer Merchandise</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada customer.</td>
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
    <h2 class="mb-3">Data Meja</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Meja</th>
                <th>Kapasitas</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tables as $table)
                <tr>
                    <td>{{ $table->id }}</td>
                    <td>{{ $table->name }}</td>
                    <td>{{ $table->capacity }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada meja.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <h2 class="mb-3">Outlet</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($outlets as $outlet)
                <tr>
                    <td>{{ $outlet->id }}</td>
                    <td>{{ $outlet->nama }}</td>
                    <td>{{ $outlet->alamat }}</td>

                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada Outlet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <h2 class="mb-3">Menu</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Outlet ID</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menus as $menu)
                <tr>
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->nama }}</td>
                    <td>{{ $menu->harga }}</td>
                    <td>{{ $menu->outlet_id }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada menu.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <h2 class="mb-3">Pegawai</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Posisi</th>
                <th>Outlet ID</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pegawais as $pegawai)
                <tr>
                    <td>{{ $pegawai->id }}</td>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->posisi }}</td>
                    <td>{{ $pegawai->outlet_id }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada pegawai.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <h2 class="mb-3">User</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada pengguna.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
