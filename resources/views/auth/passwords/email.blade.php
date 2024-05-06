@extends('layouts.auth.main')
@section('title', 'Lupa Password')
@section('content')
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            {{-- <div class="col-lg-6 d-none d-lg-block p-2">
                            <img src="{{ asset('backend/assets') }}/images/auth-img.jpg" alt=""
                                class="img-fluid rounded h-100">
                        </div> --}}
                            <div class="col-lg-12">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand pt-4 text-center">
                                        <a href="{{ route('login') }}" class="logo-light">
                                            <img src="{{ asset('backend/assets') }}/images/logo.png" alt="logo"
                                                height="90" />
                                        </a>
                                        <a href="{{ route('login') }}" class="logo-dark">
                                            <img src="{{ asset('backend/assets') }}/images/logo.png" alt="dark logo"
                                                height="90" />
                                        </a>
                                    </div>
                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20">Lupa Password?</h4>
                                        <p class="text-muted mb-3">Masukkan alamat email Anda dan kami akan mengirimkan
                                            email berisi instruksi untuk mengatur ulang kata sandi Anda.</p>
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <!-- form -->
                                        <form method="POST" action="{{ route('password.email') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control  @error('email') is-invalid @enderror"
                                                    type="email" id="email" name="email" value="{{ old('email') }}"
                                                    autocomplete="email" autofocus placeholder="Masukan email">
                                                @error('email')
                                                    <small class="text-danger errorPassword mt-2">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="mb-0 text-start">
                                                <button class="btn btn-soft-primary w-100" type="submit"><i
                                                        class="ri-loop-left-line me-1 fw-bold"></i> <span
                                                        class="fw-bold">Reset Password</span> </button>
                                            </div>
                                        </form>
                                        <!-- end form-->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-dark-emphasis">Kembali <a href="{{ route('login') }}"
                            class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Log In</b></a></p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
@endsection
