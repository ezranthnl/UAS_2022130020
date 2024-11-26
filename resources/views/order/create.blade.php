@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Pesan Order</h2>
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <input type="hidden" name="outlet_id" value="{{ $outlet_id }}">

        <!-- Nomor Meja -->
        <div class="mb-3">
            <label for="nomor_meja" class="form-label">Nomor Meja</label>
            <input type="number" name="nomor_meja" id="nomor_meja" class="form-control" required>
        </div>

        <!-- Nama Pemesan -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pemesan</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <!-- Pilih Menu -->
        <h4>Menu</h4>
        <div id="menu-list">
            @foreach ($menu as $item)
                <div class="mb-3">
                    <label for="menu_{{ $loop->index }}_jumlah">{{ $item['nama'] }} (Rp {{ number_format($item['harga'], 0, ',', '.') }})</label>
                    <input type="hidden" name="menu[{{ $loop->index }}][nama]" value="{{ $item['nama'] }}">
                    <input type="hidden" name="menu[{{ $loop->index }}][harga]" value="{{ $item['harga'] }}">
                    <input type="number" name="menu[{{ $loop->index }}][jumlah]" id="menu_{{ $loop->index }}_jumlah" class="form-control" min="0" value="0">
                </div>
            @endforeach
        </div>

        <!-- Metode Pembayaran -->
        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" required>
                <option value="Cash">Cash</option>
                <option value="Credit">Credit</option>
                <option value="QRIS">QRIS</option>
            </select>
        </div>

        <!-- Tombol Order -->
        <button type="submit" class="btn btn-primary">Order</button>
    </form>
</div>
@endsection
