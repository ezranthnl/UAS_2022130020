@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-white mb-4">Pilih Outlet</h2>
    <div class="row">
        @foreach ($outlets as $outlet)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset($outlet->foto) }}" class="card-img-top" alt="{{ $outlet->nama }}" style="height: 400px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $outlet->nama }}</h5>
                        <p class="card-text">{{ $outlet->alamat }}</p>
                        <a href="{{ url('/outlet/' . $outlet->id) }}" class="btn btn-warning">Lihat Menu (ID: {{ $outlet->id }})</a>
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
@endsection
