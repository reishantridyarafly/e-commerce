@extends('layouts.auth.main')
@section('title', 'Register')
@section('content')
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-10">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            {{-- <div class="col-lg-6 d-none d-lg-block p-2">
                            <img src="{{ asset('backend/assets') }}/images/auth-img.jpg" alt=""
                                class="img-fluid rounded h-100" />
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
                                        <h4 class="fs-20">Sign Up</h4>
                                        <p class="text-muted mb-3"> Masukkan alamat email / no telepon dan kata sandi
                                            Anda untuk mengakses akun.</p>

                                        <!-- form -->
                                        <form id="form">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Nama Depan</label>
                                                        <input class="form-control" type="text" id="first_name"
                                                            name="first_name" placeholder="Masukan nama depan">
                                                        <small class="text-danger errorFirstName mt-2"></small>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="last_name" class="form-label">Nama Belakang</label>
                                                        <input class="form-control" type="text" id="last_name"
                                                            name="last_name" placeholder="Masukan nama depan">
                                                        <small class="text-danger errorLastName mt-2"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control" type="email" id="email" name="email"
                                                    placeholder="Masukan email">
                                                <small class="text-danger errorEmail mt-2"></small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="no_telepon" class="form-label">No Telepon</label>
                                                <input class="form-control" type="number" id="no_telepon" name="no_telepon"
                                                    placeholder="Masukan no telepon">
                                                <small class="text-danger errorNoTelepon mt-2"></small>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
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
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="password_confirmation" class="form-label">Konfirmasi
                                                            Password</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="password" id="password_confirmation"
                                                                name="password_confirmation" class="form-control"
                                                                placeholder="Masukan konfirmasi password">
                                                            <div class="input-group-text" data-password="false">
                                                                <span class="password-eye"></span>
                                                            </div>
                                                        </div>
                                                        <small class="text-danger errorConfirmPassword mt-2"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-0 d-grid text-center">
                                                <button class="btn btn-primary fw-semibold" type="submit"
                                                    id="register">Sign
                                                    Up</button>
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
                        Sudah punya akun?
                        <a href="{{ route('login') }}"
                            class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Log In</b></a>
                    </p>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
@endsection

@section('javascript')
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
                    url: "{{ route('register') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#register').attr('disable', 'disabled');
                        $('#register').text('Proses...');
                    },
                    complete: function() {
                        $('#register').removeAttr('disable');
                        $('#register').html('Sign Up');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.first_name) {
                                $('#first_name').addClass('is-invalid');
                                $('.errorFirstName').html(response.errors.first_name);
                            } else {
                                $('#first_name').removeClass('is-invalid');
                                $('.errorFirstName').html('');
                            }

                            if (response.errors.last_name) {
                                $('#last_name').addClass('is-invalid');
                                $('.errorLastName').html(response.errors.last_name);
                            } else {
                                $('#last_name').removeClass('is-invalid');
                                $('.errorLastName').html('');
                            }

                            if (response.errors.email) {
                                $('#email').addClass('is-invalid');
                                $('.errorEmail').html(response.errors.email);
                            } else {
                                $('#email').removeClass('is-invalid');
                                $('.errorEmail').html('');
                            }

                            if (response.errors.no_telepon) {
                                $('#no_telepon').addClass('is-invalid');
                                $('.errorNoTelepon').html(response.errors.no_telepon);
                            } else {
                                $('#no_telepon').removeClass('is-invalid');
                                $('.errorNoTelepon').html('');
                            }

                            if (response.errors.password) {
                                $('#password').addClass('is-invalid');
                                $('.errorPassword').html(response.errors.password);
                            } else {
                                $('#password').removeClass('is-invalid');
                                $('.errorPassword').html('');
                            }

                            if (response.errors.password_confirmation) {
                                $('#password_confirmation').addClass('is-invalid');
                                $('.errorConfirmPassword').html(response.errors
                                    .password_confirmation);
                            } else {
                                $('#password_confirmation').removeClass('is-invalid');
                                $('.errorConfirmPassword').html('');
                            }

                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Data berhasil disimpan',
                            }).then(function() {
                                top.location.href =
                                    "{{ route('login.index') }}";
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });
        });
    </script>
@endsection
