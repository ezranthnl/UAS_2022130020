@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Reservasi Meja</h2>

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

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="table_id" class="form-label">Pilih Meja</label>
            <select name="table_id" id="table_id" class="form-select" required>
                <option value="" disabled selected>Pilih meja...</option>
                @foreach ($tables as $table)
                    <option value="{{ $table->id }}">Meja {{ $table->name }} - Kapasitas: {{ $table->capacity }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_reservasi" class="form-label">Tanggal Reservasi</label>
            <input type="datetime-local" name="reservation_time" id="reservation_time" class="form-control" required>        </div>

        <div class="mb-3">
            <label for="jumlah_tamu" class="form-label">Jumlah Tamu</label>
            <input type="number" name="jumlah_tamu" id="jumlah_tamu" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" required>
                <option value="" disabled selected>Pilih metode pembayaran...</option>
                <option value="QRIS">QRIS</option>
                <option value="cash">Cash</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="text" name="total_harga" id="total_harga" class="form-control" value="50000" readonly>
        </div>

        <button type="submit" class="btn btn-warning">Reservasi</button>
    </form>
</div>
@endsection
