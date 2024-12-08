@extends('layouts.app')

@section('content')
<section class="mt-5">
    <div class="container">
        <h2>Konfirmasi Order</h2>
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <input type="hidden" name="outlet_id" value="{{ $data['outlet_id'] }}">
            <input type="hidden" name="nomor_meja" value="{{ $data['nomor_meja'] }}">
            <input type="hidden" name="nama_pelanggan" value="{{ $data['nama_pelanggan'] }}">
            <input type="hidden" name="metode_pembayaran" value="{{ $data['metode_pembayaran'] }}">

            <h4>Pesanan</h4>
            <ul>
                @foreach ($data['menu'] as $menu)
                    <li>{{ $menu['nama'] }} - Rp {{ number_format($menu['harga'], 0, ',', '.') }} x {{ $menu['jumlah'] }}</li>
                @endforeach
            </ul>

            <h4>Total Harga: Rp {{ number_format($total, 0, ',', '.') }}</h4>

            <button type="submit" class="btn btn-primary">Simpan Order</button>
        </form>
    </div>
</section>
@endsection
