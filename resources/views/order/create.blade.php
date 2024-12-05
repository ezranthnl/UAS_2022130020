@extends('layouts.app')

@section('content')
<section class="mt-5" style="background-color: #f7963b; padding: 25px 0; position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px;">
    <!-- Foto Samping Kiri -->
    <div class="position-absolute" style="left: 1.5%; top:30%; transform: translateY(0%); width: 10%;">
        <img src="{{ asset('storage/background1.jpg') }}" class="img-fluid" alt="Foto Kiri" style="border-radius: 8px;">
    </div>
    <div class="position-absolute" style="right: 1.5%; top:30%; transform: translateY(0%); width: 10%;">
        <img src="{{ asset('storage/background2.jpg') }}" class="img-fluid" alt="Foto Kanan" style="border-radius: 8px;">
    </div>

    <div class="container mt-5">
        <h2>Pesan Order</h2>
        <form action="{{ route('order.preview') }}" method="POST">
            @csrf
            <input type="hidden" name="outlet_id" value="{{ $outlet->id }}">

            <!-- Nomor Meja -->
            <div class="mb-3">
                <label for="nomor_meja">Nomor Meja</label>
                <input type="number" name="nomor_meja" id="nomor_meja" class="form-control" required>
            </div>

            <!-- Nama Pemesan -->
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <!-- Pilih Menu -->
            <h4>Pilih Menu</h4>
            <div class="mb-3">
                @foreach ($menus as $menu)
                    <div class="form-group row align-items-center mb-2">
                        <div class="col-md-8">
                            <label for="menu_{{ $menu->id }}">{{ $menu->nama }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}</label>
                        </div>
                        <div class="col-md-4">
                            <input type="hidden" name="menu[{{ $menu->id }}][nama]" value="{{ $menu->nama }}">
                            <input type="hidden" name="menu[{{ $menu->id }}][harga]" value="{{ $menu->harga }}">
                            <input type="number" name="menu[{{ $menu->id }}][jumlah]" id="menu_{{ $menu->id }}" class="form-control" min="0" value="0">
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-3">
                <label for="metode_pembayaran">Metode Pembayaran</label>
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
</section>

<style>
    body {
        background-color: #ffffff;
        background-image: url('storage/background1.jpg'), url('storage/background2.jpg');
        background-position: left top, right top;
        background-repeat: no-repeat;
        background-size: contain;
    }

    .container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 100px rgba(0, 0, 0, 0.1);
    }

    /* Contoh struktur gambar untuk background kiri dan kanan */
    body::before, body::after {
        content: '';
        position: fixed;
        top: 0;
        bottom: 0;
        width: 200px;
        background-size: cover;
    }

    body::before {
        left: 0;
        background-image: url('storage/background1.jpg');
    }

    body::after {
        right: 0;
        background-image: url('storage/background2.jpg');
    }
</style>
@endsection
