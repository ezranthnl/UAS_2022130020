@extends('layouts.app')

@section('content')
<section class="mt-5" style="background-color: #f7963b; padding: 25px 0; position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px;">
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

            <div class="mb-3">
                <label for="nomor_meja">Nomor Meja</label>
                <input type="number" name="nomor_meja" id="nomor_meja" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" required>
            </div>

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
                            <input type="number" name="menu[{{ $menu->id }}][jumlah]" id="menu_{{ $menu->id }}" class="form-control jumlah-menu" min="0" value="0" oninput="updateTotal()">
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="metode_pembayaran">Metode Pembayaran</label>
                <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" required>
                    <option value="Cash">Cash</option>
                    <option value="Credit">Credit</option>
                    <option value="QRIS">QRIS</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="total_harga">Total Harga</label>
                <input type="text" name="total_harga" id="total_harga" class="form-control" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Konfirmasi</button>
        </form>
    </div>
</section>

<script>
    function updateTotal() {
        let total = 0;
        document.querySelectorAll('.jumlah-menu').forEach(function(element) {
            const harga = parseFloat(element.closest('.form-group').querySelector('input[name*="[harga]"]').value);
            const jumlah = parseInt(element.value);
            total += harga * jumlah;
        });
        document.getElementById('total_harga').value = 'Rp ' + total.toLocaleString('id-ID');
    }
</script>

<style>
    body {
        background-color: #ffffff;
        background-image: url('{{ asset('storage/background1.jpg') }}'), url('{{ asset('storage/background2.jpg') }}');
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
        background-image: url('{{ asset('storage/background1.jpg') }}');
    }

    body::before {
        right: 0;
        background-image: url('{{ asset('storage/background2.jpg') }}');
    }
</style>
@endsection
