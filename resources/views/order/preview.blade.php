@extends('layouts.app')

@section('content')
<section class="mt-5" style="background-color: #f7963b; padding: 25px 0; position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px;">
    <div class="container mt-5">
        <h2>Konfirmasi Pesanan</h2>
        <p>Data berhasil diterima. Cek detail di bawah:</p>
        <pre>{{ json_encode($data, JSON_PRETTY_PRINT) }}</pre> <!-- Debugging data -->

        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <input type="hidden" name="outlet_id" value="{{ $data['outlet_id'] }}">
            <input type="hidden" name="nomor_meja" value="{{ $data['nomor_meja'] }}">
            <input type="hidden" name="nama" value="{{ $data['nama'] }}">
            <input type="hidden" name="metode_pembayaran" value="{{ $data['metode_pembayaran'] }}">

            <h4>Rincian Pesanan</h4>
            <ul class="list-group mb-3">
                @foreach ($data['menu'] as $menu)
                    @if ($menu['jumlah'] > 0)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $menu['nama'] }} x {{ $menu['jumlah'] }}
                            <span>Rp {{ number_format($menu['harga'] * $menu['jumlah'], 0, ',', '.') }}</span>
                            <input type="hidden" name="menu[{{ $menu['id'] }}][id]" value="{{ $menu['id'] }}">
                            <input type="hidden" name="menu[{{ $menu['id'] }}][jumlah]" value="{{ $menu['jumlah'] }}">
                            <input type="hidden" name="menu[{{ $menu['id'] }}][harga]" value="{{ $menu['harga'] }}">
                            <input type="hidden" name="menu[{{ $menu['id'] }}][nama]" value="{{ $menu['nama'] }}">
                        </li>
                    @endif
                @endforeach
            </ul>

            <h4>Total: Rp {{ number_format($total, 0, ',', '.') }}</h4>

            <button type="submit" class="btn btn-primary">Konfirmasi dan Bayar</button>
        </form>
    </div>
</section>
@endsection
