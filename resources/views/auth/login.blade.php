<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | E-Commerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="{{ csrf_token() }}" name="csrf-token">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico" />

    <!-- Theme Config Js -->
    <script src="{{ asset('assets') }}/js/config.js"></script>

    <!-- App css -->
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg position-relative">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            {{-- <div class="col-lg-6 d-none d-lg-block p-2">
                                <img src="{{ asset('assets') }}/images/auth-img.jpg" alt=""
                                    class="img-fluid rounded h-100" />
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand p-4">
                                        <a href="index.html" class="logo-light">
                                            <img src="{{ asset('assets') }}/images/logo.png" alt="logo"
                                                height="22" />
                                        </a>
                                        <a href="index.html" class="logo-dark">
                                            <img src="{{ asset('assets') }}/images/logo-dark.png" alt="dark logo"
                                                height="22" />
                                        </a>
                                    </div>
                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20">Sign In</h4>
                                        <p class="text-muted mb-3">
                                            Masukkan alamat email / no telepon dan kata sandi Anda untuk mengakses akun.
                                        </p>

                                        <!-- form -->
                                        <form id="form">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Email / No Telepon</label>
                                                <input class="form-control" type="text" id="username"
                                                    name="username" autocomplete="username" autofocus
                                                    placeholder="Masukan email / no telepon" />
                                                <small class="text-danger errorUsername mt-2"></small>
                                            </div>
                                            <div class="mb-3">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}"
                                                        class="text-muted float-end"><small>Lupa password?</small></a>
                                                @endif
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" name="password"
                                                        class="form-control" placeholder="Masukan password">
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                </div>
                                                <small class="text-danger errorPassword mt-2"></small>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="remember"
                                                        name="remember" {{ old('remember') ? 'checked' : '' }} />
                                                    <label class="form-check-label" for="checkbox-signin">
                                                        Ingat saya</label>
                                                </div>
                                            </div>
                                            <div class="mb-0 text-start">
                                                <button class="btn btn-soft-primary w-100" type="submit"
                                                    id="login">
                                                    <i class="ri-login-circle-fill me-1"></i>
                                                    <span class="fw-bold">Log In</span>
                                                </button>
                                            </div>
                                        </form>
                                        <!-- end form-->
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-dark-emphasis">
                        Tidak memiliki akun?
                        <a href="{{ route('register') }}"
                            class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Sign up</b></a>
                    </p>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
        <span class="text-dark">
            <script>
                document.write(new Date().getFullYear())
            </script> © {{ config('app.name') }} - by <b>Rio Akbar Turmuzi </b>
        </span>
    </footer>
    <!-- Vendor js -->
    <script src="{{ asset('assets') }}/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('assets') }}/js/app.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ route('login') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#login').attr('disable', 'disabled');
                        $('#login').text('Proses...');
                    },
                    complete: function() {
                        $('#login').removeAttr('disable');
                        $('#login').html(
                            `<i class="ri-login-circle-fill me-1"></i><span class="fw-bold">Log In</span>`
                        );
                    },
                    success: function(response) {
                        if (response.errors) {
                            $('#username').addClass('is-invalid');
                            $('.errorUsername').html(response.errors.username || '');

                            $('#password').addClass('is-invalid');
                            $('.errorPassword').html(response.errors.password || '');
                        } else if (response.NoUsername || response.NonActiveUsername || response
                            .WrongPassword) {
                            let errorMessage = '';
                            if (response.NoUsername) {
                                errorMessage = response.NoUsername.message;
                            } else if (response.NonActiveUsername) {
                                errorMessage = response.NonActiveUsername.message;
                            } else if (response.WrongPassword) {
                                errorMessage = response.WrongPassword.message;
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Failed',
                                text: errorMessage
                            });

                            if (response.NoUsername || response.NonActiveUsername) {
                                $('#username').val('');
                            }
                            if (response.WrongPassword || response.NoUsername || response
                                .NonActiveUsername) {
                                $('#password').val('');
                            }
                        } else {
                            window.location.href = response.redirect;
                        }

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });
        })
    </script>
</body>

</html>
