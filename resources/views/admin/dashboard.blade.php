@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Dashboard Admin</h1>

    <div class="row">
        <div class="col-md-4 mb-3">
            <a href="{{ route('admin.index') }}" class="btn btn-primary btn-lg btn-block">
                Semua Data
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('admin.transaksi') }}" class="btn btn-primary btn-lg btn-block">
                Data Transaksi
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('admin.data') }}" class="btn btn-primary btn-lg btn-block">
                Data Website
            </a>
        </div>
    </div>
</div>
@endsection
