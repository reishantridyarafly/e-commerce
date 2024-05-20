@extends('layouts.frontend.main')
@section('title', 'Kontak')
@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="radios-breadcrumb breadcrumbs">
                <ul class="list-unstyled d-flex align-items-center">
                    <li class="radiosbcrumb-item radiosbcrumb-begin">
                        <a href="{{ route('beranda.index') }}"><span>Beranda</span></a>
                    </li>
                    <li class="radiosbcrumb-item radiosbcrumb-end">
                        <span>Kontak</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- contact info start -->
    <section class="contact-info">
        <div class="container">
            <div class="row justify-content-center mt-none-30">
                <div class="col-xl-4 col-lg-4 col-md-6 mt-30">
                    <div class="contact-info__item d-flex">
                        <span class="icon"><img src="{{ asset('frontend/assets') }}/img/icon/mail.svg"
                                alt=""></span>
                        <div class="content">
                            <h3>Email</h3>
                            <a href="mailto:radios.info@gmail.com">radios.info@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mt-30">
                    <div class="contact-info__item active d-flex">
                        <span class="icon"><img src="{{ asset('frontend/assets') }}/img/icon/location.svg"
                                alt=""></span>
                        <div class="content">
                            <h3>Lokasi</h3>
                            <p>Jln. Mohamad Toha No. 11, Kasturi - Kuningan, Rest Area Cirendang (Depan Kantor BPJS
                                Kuningan)</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mt-30">
                    <div class="contact-info__item d-flex">
                        <span class="icon"><img src="{{ asset('frontend/assets') }}/img/icon/call-2.svg"
                                alt=""></span>
                        <div class="content">
                            <h3>No Telepon</h3>
                            <a href="tel:404555012834">0852-2400-4888</a>
                            <a href="tel:404555012863">0896-1714-4066</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact info end -->

    <!-- contact start -->
    <section class="contact pt-90 mb-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="contact-img pos-rel">
                        <img src="{{ asset('frontend/assets') }}/img/contact/img_01.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-from__wrap pl-55">
                        <form class="contact-from" id="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact-from__field">
                                        <input type="text" name="nama" id="nama" placeholder="Nama Lengkap">
                                        <small class="text-danger errorNama"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-from__field">
                                        <input type="text" name="email" id="email" placeholder="Email">
                                        <small class="text-danger errorEmail"></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-from__field">
                                        <input type="number" name="no_telepon" id="no_telepon"placeholder="No Telepon">
                                        <small class="text-danger errorNoTelepon"></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-from__field">
                                        <textarea name="pesan" id="pesan" cols="30" rows="10" placeholder="Pesan"></textarea>
                                        <small class="text-danger errorPesan"></small>
                                    </div>
                                </div>
                                <div class="contact-from__btn mt-20">
                                    <button class="thm-btn thm-btn__2" type="submit" id="simpan">
                                        <span class="btn-wrap">
                                            <span>Kirim Pesan</span>
                                            <span>Kirim Pesan</span>
                                        </span>
                                        <i class="far fa-long-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact end -->
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
                    url: "{{ route('kontak.store') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#simpan').attr('disable', 'disabled');
                        $('#simpan').html(`<span class="btn-wrap">
                                                <span>Proses...</span>
                                                <span>Proses...</span>
                                            </span>`);
                    },
                    complete: function() {
                        $('#simpan').removeAttr('disable');
                        $('#simpan').html(`<span class="btn-wrap">
                                                <span>Kirim Pesan</span>
                                                <span>Kirim Pesan</span>
                                            </span>
                                            <i class="far fa-long-arrow-right"></i>`);
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.nama) {
                                $('#nama').addClass('is-invalid');
                                $('.errorNama').html(response.errors.nama);
                            } else {
                                $('#nama').removeClass('is-invalid');
                                $('.errorNama').html('');
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

                            if (response.errors.pesan) {
                                $('#pesan').addClass('is-invalid');
                                $('.errorPesan').html(response.errors.pesan);
                            } else {
                                $('#pesan').removeClass('is-invalid');
                                $('.errorPesan').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.message,
                            }).then(function() {
                                window.location.href = window.location.href;
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
