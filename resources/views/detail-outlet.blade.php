@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Detail {{ $outlet->nama }}</h2>
    <p>Alamat: {{ $outlet->alamat }}</p>

    <a href="{{ route('pilih-outlet') }}" class="btn btn-secondary">Kembali ke Daftar Outlet</a>

    <div class="text-center">
        <a href="{{ route('order.create', ['id' => $outlet->id]) }}" class="btn btn-warning btn-lg">
            Mulai Order
        </a>
    </div>

    <h4>Menu</h4>
    <ul class="list-group mb-4">
        @foreach ($menus as $menu)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <img src="{{ asset($menu->gambar) }}" alt="{{ $menu->nama }}" style="width: 100px; height: 100px; border-radius: 50%; margin-right: 10px;">
                {{ $menu->nama }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}
                <p>{{ $menu->deskripsi }}</p>
            </li>
        @endforeach
    </ul>

    <h4>Pegawai</h4>
    <ul class="list-group mb-4">
        @foreach ($pegawais as $pegawai)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <img src="{{ asset($pegawai->gambar) }}" alt="{{ $pegawai->nama }}" style="width: 100px; height: 100px; border-radius: 50%; margin-right: 10px;">
                {{ $pegawai->nama }} - {{ $pegawai->posisi }}
            </li>
        @endforeach
    </ul>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
    </div>

    <a href="{{ route('pilih-outlet') }}" class="btn btn-secondary">Kembali ke Daftar Outlet</a>

    <div class="container my-4">
        <h1 class="text-center">Detail Outlet</h1>

        <!-- Informasi Outlet -->
        <div class="card mb-4">
            <div class="card-body">
                <h2>{{ $outlet->nama }}</h2>
            </div>
            <div class="">
                <h4>{{ $outlet->alamat }}</h4>
            </div>
        </div>
    </div>
</div>
@endsection
