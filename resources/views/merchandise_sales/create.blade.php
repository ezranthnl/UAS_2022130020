@extends('layouts.app')

@section('content')
<section class="mt-5" style="background-color: #ffffff; padding: 100px 0; position: relative; border-top-left-radius: 1000px; border-top-right-radius: 1000px;">
    <div class="position-absolute" style="left: 0; top: 0; width: 50%; height: 100%; z-index: -1; opacity: 0.3;">
        <img src="{{ asset('storage/background1.jpg') }}" class="img-fluid" alt="Background Kiri" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div class="position-absolute" style="right: 0; top: 0; width: 50%; height: 100%; z-index: -1; opacity: 0.3;">
        <img src="{{ asset('storage/background2.jpg') }}" class="img-fluid" alt="Background Kanan" style="width: 100%; height: 100%; object-fit: cover;">
    </div>

    <div class="container mt-5" style="position: relative; z-index: 1;">
        <h1 class="text-center mb-4" style="font-family: 'Arial Black', sans-serif; color: #f7963b; text-shadow: 2px 2px #000;">Merchandise Kopi Kisah Manis</h1>
        <h2 class="text-center text-white mb-4">Catat Penjualan Merchandise</h2>
        <form id="merchandiseSaleForm" action="{{ route('merchandise-sales.store') }}" method="POST" onsubmit="cleanTotalPrice()">
            @csrf
            <div class="mb-3">
                <label for="product_id" class="text-white">Pilih Produk</label>
                <select name="product_id" id="product_id" class="form-select" required onchange="updateTotal()">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="customer_id" class="text-white">Pilih Pelanggan</label>
                <select name="customer_id" id="customer_id" class="form-select" required>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="text-white">Jumlah</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required oninput="updateTotal()">
            </div>

            <div class="mb-3">
                <label for="total_price" class="text-white">Total Harga</label>
                <input type="text" name="total_price" id="total_price" class="form-control" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Catat Penjualan</button>
        </form>

        <h3 class="text-white mt-5">Tambah Pelanggan Baru</h3>
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="text-white">Nama</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="text-white">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
        </form>
    </div>
</section>

<script>
    function updateTotal() {
        const productSelect = document.getElementById('product_id');
        const quantityInput = document.getElementById('quantity');
        const totalPriceInput = document.getElementById('total_price');

        const price = parseFloat(productSelect.selectedOptions[0].getAttribute('data-price'));
        const quantity = parseInt(quantityInput.value);

        if (!isNaN(price) && !isNaN(quantity)) {
            const total = price * quantity;
            totalPriceInput.value = 'Rp ' + total.toLocaleString('id-ID');
        } else {
            totalPriceInput.value = '';
        }
    }

    function cleanTotalPrice() {
        const totalPriceInput = document.getElementById('total_price');
        totalPriceInput.value = totalPriceInput.value.replace(/[^\d]/g, '');
    }
</script>
@endsection
