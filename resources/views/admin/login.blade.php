@extends('layouts.app')

@section('content')
<section class="vh-100" style="background: url('{{ asset('storage/background1.jpg') }}') left center / cover no-repeat, url('{{ asset('storage/background2.jpg') }}') right center / cover no-repeat;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem; background-color: rgba(255, 255, 255, 0.9);">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4" style="font-family: 'Arial Black', sans-serif; color: #000;">
                            {{ __('Admin Login') }}
                        </h3>
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf

                            <div class="form-outline mb-4">
                                <label for="email" class="">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <label for="password" class="">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                           
                            <button class="btn btn-primary btn-lg btn-block" type="submit">{{ __('Login') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
