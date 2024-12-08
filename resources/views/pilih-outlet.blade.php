@extends('layouts.app')

@section('content')
<section class="mt-5">
    <div class="container">
        <div class="position-absolute" style="right: 0; top: 0; transform: translateY(0); width: 100px;">
            <img src="{{ asset('storage/logo.jpg') }}" class="img-fluid" alt="Logo" style="border-radius: 8px;">
        </div>
        <h2 class="text-center text-white mb-4">Pilih Outlet</h2>
        <div class="row">
            @foreach ($outlets as $outlet)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset($outlet->foto) }}" class="card-img-top" alt="{{ $outlet->nama }}" style="height: 400px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $outlet->nama }}</h5>
                            <p class="card-text">{{ $outlet->alamat }}</p>
                            <a href="{{ url('/outlet/' . $outlet->id) }}" class="btn btn-warning">Menu</a>
                            <a href="{{ route('reservations.index') }}" class="btn btn-warning btn-lg">Reservasi Meja</a>
                            <a href="{{ route('merchandise-sales.create') }}" class="btn btn-warning btn-lg mt-2">Beli Merchandise</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-3 d-flex justify-content-center">
            {{ $outlets->links() }}
        </div>
    </div>
</section>
@endsection
