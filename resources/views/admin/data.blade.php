@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Data Website</h1>

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
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada pengguna.</td>
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
</div>
@endsection
