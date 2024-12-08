@extends('layouts.app')

@section('content')
<section class="vh-100 position-relative" style="background: url('{{ asset('storage/background1.jpg') }}') left center / cover no-repeat, url('{{ asset('storage/background2.jpg') }}') right center / cover no-repeat;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="container py-5 h-100" style="position: relative; z-index: 1;">
        <h2 class="text-center mb-4" style="font-family: 'Arial Black', sans-serif; color: #ffffff; text-shadow: 2px 2px #000;">Reservasi Meja</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reservations.store') }}" method="POST" class="bg-light p-4 rounded" style="border-radius: 1rem;">
            @csrf

            <div class="mb-3">
                <label for="table_id" class="">Pilih Meja</label>
                <select name="table_id" id="table_id" class="form-select" required>
                    <option value="" disabled selected>Pilih meja...</option>
                    @foreach ($tables as $table)
                        <option value="{{ $table->id }}">Meja {{ $table->name }} - Kapasitas: {{ $table->capacity }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_reservasi" class="">Tanggal Reservasi</label>
                <input type="datetime-local" name="reservation_time" id="reservation_time" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_tamu" class="">Jumlah Tamu</label>
                <input type="number" name="jumlah_tamu" id="jumlah_tamu" class="form-control" min="1" required>
            </div>

            <div class="mb-3">
                <label for="metode_pembayaran" class="">Metode Pembayaran</label>
                <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" required>
                    <option value="" disabled selected>Pilih metode pembayaran...</option>
                    <option value="QRIS">QRIS</option>
                    <option value="cash">Cash</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="total_harga" class="">Total Harga</label>
                <input type="text" name="total_harga" id="total_harga" class="form-control" value="50000" readonly>
            </div>

            <button type="submit" class="btn btn-warning">Reservasi</button>
        </form>
    </div>
</section>
@endsection
