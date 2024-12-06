@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Heading Welcome -->
        <h1 class="text-center mt-5">Selamat Datang Manis</h1>

        <!-- Section Tentang Kafe dengan background hijau muda dan foto di kiri-kanan -->
        <section class="mt-5"
            style="background-color: #f7963b; padding: 25px 0; position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px;">
            <!-- Foto Samping Kiri -->
            <div class="position-absolute" style="left: -10%; top:100%; transform: translateY(-50%); width: 25%;">
                <img src="{{ asset('storage/background1.jpg') }}" class="img-fluid" alt="Foto Kiri" style="border-radius: 8px;">
            </div>

            <!-- Foto Samping Kanan -->
            <div class="position-absolute" style="right: -10%; top: 100%; transform: translateY(-50%); width: 25%;">
                <img src="{{ asset('storage/background2.jpg') }}" class="img-fluid" alt="Foto Kanan"
                    style="border-radius: 8px;">
            </div>

            <!-- Foto Logo -->
            <div class="position-absolute" style="right: 37%; top: -36%; transform: translateY(-50%); width: 25%;">
                <img src="{{ asset('storage/logo.jpg') }}" class="img-fluid" alt="Logo" style="border-radius: 8px;">
            </div>

            <!-- Konten Tengah -->
            <div class="text-center text-white">
                <h2>Tentang Kafe</h2>
                <p>Kopi Kisah Manis adalah tempat terbaik untuk menikmati kopi sambil bercerita bersama teman-teman. Kami
                    menyediakan berbagai macam pilihan kopi dan makanan ringan yang bisa dinikmati di tempat yang nyaman.
                </p>
                <p>Signature drinks kami adalah pilihan istimewa yang wajib dicoba:</p>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body" style=" color: rgb(241, 145, 0);">
                                <h5 class="card-title">Kopi Kisah Manis</h5>
                                <p class="card-text">Cita rasa kopi klasik dengan sentuhan khas, diracik dengan penuh
                                    perhatian.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body" style=" color: rgb(241, 145, 0);">
                                <h5 class="card-title">Kopi Kisah Asmara</h5>
                                <p class="card-text">Cita rasa kopi klasik dengan sentuhan khas, diracik dengan penuh
                                    perhatian.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body" style=" color: rgb(241, 145, 0);">
                                <h5 class="card-title">Racikan Imun</h5>
                                <p class="card-text">Cita rasa kopi klasik dengan sentuhan khas, diracik dengan penuh
                                    perhatian.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Pilih Outlet -->
        <section class="mt-5">
            <h2 class="text-center">Pilih Outlet Untuk Pesan</h2>
            <div class="text-center">
                <a href="{{ route('pilih-outlet') }}" class="btn btn-warning btn-lg">Pilih Outlet</a>
            </div>
            
        </section>

        <!-- Section Gambar Minuman -->
        <section class="mt-5">
            <h2 class="text-center">Minuman Kami</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/kopikisman.jpeg') }}" class="card-img-top" alt="Minuman 1">
                        <div class="card-body">
                            <h5 class="card-title">Kopi Kisah Manis</h5>
                            <p class="card-text">Terbuat dari Espresso, Gula Aren, dengan Cream Machiato di atas</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/asmara.jpeg') }}" class="card-img-top" alt="Minuman 2">
                        <div class="card-body">
                            <h5 class="card-title">Kopi Kisah Asmara</h5>
                            <p class="card-text">Terbuat dari Espresso, Gula Putih, Kayu Manis, dengan Cream Machiato dan
                                taburan bubuk Kayu Manis di atas</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/goguma.jpg') }}" class="card-img-top" alt="Minuman 3">
                        <div class="card-body">
                            <h5 class="card-title">Goguma Ppang</h5>
                            <p class="card-text">Roti Ubi yang berisikan Keju Mozarella.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Gambar Outlet dengan Carousel -->
        <section class="mt-5"
            style="background-color: #f7963b; padding: 25px 0; position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px;">
            <h2 class="text-center">Outlet Kami</h2>
            <h2 class="text-center">--Absal--</h2>

            <div id="outletCarousel" class="carousel slide" data-bs-ride="carousel">
                <div id="outletCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Outlet 1 -->
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/absal1.jpg') }}" class="d-block w-50 mx-auto"
                                alt="Outlet 1 - Gambar 1" style="max-width: 80%; height: auto;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/absal2.jpg') }}" class="d-block w-50 mx-auto"
                                alt="Outlet 1 - Gambar 2" style="max-width: 80%; height: auto;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/absal3.jpg') }}" class="d-block w-50 mx-auto"
                                alt="Outlet 1 - Gambar 3" style="max-width: 80%; height: auto;">
                        </div>
                    </div>




                    <h2 class="text-center">--Sunda--</h2>

                    <div id="outletCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div id="outletCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <!-- Outlet 1 -->
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/sunda1.jpg') }}" class="d-block w-50 mx-auto"
                                        alt="Outlet 1 - Gambar 1" style="max-width: 80%; height: auto;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/sunda2.jpg') }}" class="d-block w-50 mx-auto"
                                        alt="Outlet 1 - Gambar 2" style="max-width: 80%; height: auto;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/sunda3.jpg') }}" class="d-block w-50 mx-auto"
                                        alt="Outlet 1 - Gambar 3" style="max-width: 80%; height: auto;">
                                </div>
                            </div>




                            <!-- Outlet 3 -->
                            <h2 class="text-center">--Dago--</h2>

                            <div id="outletCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div id="outletCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <!-- Outlet 1 -->
                                        <div class="carousel-item active">
                                            <img src="{{ asset('storage/dago1.jpg') }}" class="d-block w-50 mx-auto"
                                                alt="Outlet 1 - Gambar 1" style="max-width: 80%; height: auto;">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('storage/dago2.jpg') }}" class="d-block w-50 mx-auto"
                                                alt="Outlet 1 - Gambar 2" style="max-width: 80%; height: auto;">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('storage/dago3.jpg') }}" class="d-block w-50 mx-auto"
                                                alt="Outlet 1 - Gambar 3" style="max-width: 80%; height: auto;">
                                        </div>
                                    </div>
                                    <!-- Controls -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
