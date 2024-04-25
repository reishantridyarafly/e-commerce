<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Lupa Password | E-Commerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets') }}/js/config.js"></script>

    <!-- App css -->
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg">

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-10">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-none d-lg-block p-2">
                                <img src="{{ asset('assets') }}/images/auth-img.jpg" alt=""
                                    class="img-fluid rounded h-100">
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand p-4">
                                        <a href="index.html" class="logo-light">
                                            <img src="{{ asset('assets') }}/images/logo.png" alt="logo"
                                                height="22">
                                        </a>
                                        <a href="index.html" class="logo-dark">
                                            <img src="{{ asset('assets') }}/images/logo-dark.png" alt="dark logo"
                                                height="22">
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
                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf
                                            <input type="hidden" name="token" value="{{ $token }}">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control  @error('email') is-invalid @enderror"
                                                    type="email" id="email" name="email"
                                                    value="{{ $email ?? old('email') }}" autocomplete="email" autofocus
                                                    placeholder="Masukan email">
                                                @error('email')
                                                    <small class="text-danger mt-2">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" name="password"
                                                        class="form-control" placeholder="Masukan password" required
                                                        autocomplete="new-password">
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                </div>
                                                @error('password')
                                                    <small class="text-danger mt-2">{{ $message }}
                                                    </small>
                                                @enderror
                                            </div>

                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="password_confirmation" class="form-label">Konfirmasi
                                                        Password</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="password" id="password_confirmation"
                                                            name="password_confirmation" class="form-control"
                                                            placeholder="Masukan konfirmasi password" required
                                                            autocomplete="new-password">
                                                        <div class="input-group-text" data-password="false">
                                                            <span class="password-eye"></span>
                                                        </div>
                                                    </div>
                                                    @error('password')
                                                        <small class="text-danger mt-2">{{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
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
                            class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Log In</b></a>
                    </p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
        <span class="text-dark-emphasis">
            <script>
                document.write(new Date().getFullYear())
            </script> © E-Commerce - Rio Akbar Turmuzi
        </span>
    </footer>
    <!-- Vendor js -->
    <script src="{{ asset('assets') }}/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('assets') }}/js/app.min.js"></script>

</body>

</html>
