@extends('layouts.app')

@section('content')
<section class="vh-100 position-relative" style="background: url('{{ asset('storage/background1.jpg') }}') left center / cover no-repeat, url('{{ asset('storage/background2.jpg') }}') right center / cover no-repeat;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="container py-5 h-100" style="position: relative; z-index: 1;">
        <h2 class="text-center mb-4" style="font-family: 'Arial Black', sans-serif; color: #ffffff; text-shadow: 2px 2px #000;">Catat Penjualan Merchandise</h2>

        <form id="merchandiseSaleForm" action="{{ route('merchandise-sales.store') }}" method="POST" class="bg-light p-4 rounded" style="border-radius: 1rem;" onsubmit="cleanTotalPrice()">
            @csrf
            <div class="mb-3">
                <label for="product_id" class="">Pilih Produk</label>
                <select name="product_id" id="product_id" class="form-select" required onchange="updateTotal()">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="customer_id" class="">Pilih Pelanggan</label>
                <select name="customer_id" id="customer_id" class="form-select" required>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="">Jumlah</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required oninput="updateTotal()">
            </div>

            <div class="mb-3">
                <label for="total_price" class="">Total Harga</label>
                <input type="text" name="total_price" id="total_price" class="form-control" readonly>
            </div>

            <button type="submit" class="btn btn-warning">Catat Penjualan</button>
        </form>

        <h3 class="text-white mt-5">Tambah Pelanggan Baru</h3>
        <form action="{{ route('customers.store') }}" method="POST" class="bg-light p-4 rounded" style="border-radius: 1rem;">
            @csrf
            <div class="mb-3">
                <label for="name" class="">Nama</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-warning">Tambah Pelanggan</button>
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
