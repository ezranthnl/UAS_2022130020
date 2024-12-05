@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Detail {{ $outlet['nama'] }}</h2>
    <p>Alamat: {{ $outlet['alamat'] }}</p>

    <h4>Menu</h4>
    <ul class="list-group mb-4">
        @foreach ($outlet['menu'] as $menu)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $menu['nama'] }}
                <span>Rp {{ number_format($menu['harga'], 0, ',', '.') }}</span>
            </li>
        @endforeach
    </ul>




    <a href="{{ route('pilih-outlet') }}" class="btn btn-secondary">Kembali ke Daftar Outlet</a>

    <div class="container my-4">
        <h1 class="text-center">Detail Outlet</h1>



        <div class="text-center">
            <a href="{{ route('order.create', ['id' => $outlet['id']]) }}" class="btn btn-warning btn-lg">
                Mulai Order
            </a>
        </div>
    </div>
</div>
@endsection
