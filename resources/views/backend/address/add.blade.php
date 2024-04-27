@extends('layouts.backend.main')
@section('title', 'Alamat')
@section('content')
    <!-- Select2 css -->
    <link href="{{ asset('assets') }}/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                </ol>
                            </div>
                            <h4 class="page-title">@yield('title')</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="card">
                    <div class="card-body">
                        <form id="form">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <input type="hidden" name="id" id="id">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" id="name" name="name" class="form-control" autofocus>
                                        <small class="text-danger errorName"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="no_telepon" class="form-label">No Telepon</label>
                                        <input type="number" id="no_telepon" name="no_telepon" class="form-control">
                                        <small class="text-danger errorNoTelepon"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="provinsi" class="form-label">Provinsi</label>
                                        <select class="form-control select2" data-toggle="select2" name="provinsi"
                                            id="provinsi">
                                            <option value="">-- Pilih Provinsi --</option>
                                            @foreach ($provinces as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger errorProvinsi"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="kabupaten" class="form-label">Kabupaten</label>
                                        <select name="kabupaten" id="kabupaten" class="form-control select2"
                                            data-toggle="select2">
                                            <option value="">-- Pilih Kabupaten --</option>
                                        </select>
                                        <small class="text-danger errorKabupaten"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                        <select name="kecamatan" id="kecamatan" class="form-control select2"
                                            data-toggle="select2">
                                            <option value="">-- Pilih Kecamatan --</option>
                                        </select>
                                        <small class="text-danger errorKecamatan"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="desa" class="form-label">Desa</label>
                                        <select name="desa" id="desa" class="form-control select2"
                                            data-toggle="select2">
                                            <option value="">-- Pilih Desa --</option>
                                        </select>
                                        <small class="text-danger errorDesa"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="kode_pos" class="form-label">Kode Pos</label>
                                        <input type="number" id="kode_pos" name="kode_pos" class="form-control">
                                        <small class="text-danger errorKodePos"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="jalan" class="form-label">Jalan</label>
                                        <textarea name="jalan" id="jalan" rows="1" class="form-control"></textarea>
                                        <small class="text-danger errorJalan"></small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="detail_alamat" class="form-label">Detail Alamat</label>
                                        <textarea name="detail_alamat" id="detail_alamat" rows="3" class="form-control"></textarea>
                                        <small class="text-danger errorDetailAlamat"></small>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary" type="submit" id="simpan"><i
                                            class="ri-save-line me-1 fs-16 lh-1"></i>
                                        Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end card -->

            </div> <!-- container -->
        </div> <!-- content -->
    </div>
    <!--  Select2 Plugin Js -->
    <script src="{{ asset('assets') }}/vendor/select2/js/select2.min.js"></script>
    <script>
        $('.select2').select2();

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
                    url: "{{ route('alamat.store') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#simpan').attr('disable', 'disabled');
                        $('#simpan').text('Proses...');
                    },
                    complete: function() {
                        $('#simpan').removeAttr('disable');
                        $('#simpan').html(
                            `<i class="ri-save-line me-1 fs-16 lh-1"></i> Simpan`);
                    },
                    success: function(response) {
                        if (response.errors) {

                            if (response.errors.name) {
                                $('#name').addClass('is-invalid');
                                $('.errorName').html(response.errors.name);
                            } else {
                                $('#name').removeClass('is-invalid');
                                $('.errorName').html('');
                            }

                            if (response.errors.no_telepon) {
                                $('#no_telepon').addClass('is-invalid');
                                $('.errorNoTelepon').html(response.errors.no_telepon);
                            } else {
                                $('#no_telepon').removeClass('is-invalid');
                                $('.errorNoTelepon').html('');
                            }

                            if (response.errors.provinsi) {
                                $('#provinsi').addClass('is-invalid');
                                $('.errorProvinsi').html(response.errors.provinsi);
                            } else {
                                $('#provinsi').removeClass('is-invalid');
                                $('.errorProvinsi').html('');
                            }

                            if (response.errors.kabupaten) {
                                $('#kabupaten').addClass('is-invalid');
                                $('.errorKabupaten').html(response.errors.kabupaten);
                            } else {
                                $('#kabupaten').removeClass('is-invalid');
                                $('.errorKabupaten').html('');
                            }

                            if (response.errors.kecamatan) {
                                $('#kecamatan').addClass('is-invalid');
                                $('.errorKecamatan').html(response.errors.kecamatan);
                            } else {
                                $('#kecamatan').removeClass('is-invalid');
                                $('.errorKecamatan').html('');
                            }

                            if (response.errors.desa) {
                                $('#desa').addClass('is-invalid');
                                $('.errorDesa').html(response.errors.desa);
                            } else {
                                $('#desa').removeClass('is-invalid');
                                $('.errorDesa').html('');
                            }

                            if (response.errors.kode_pos) {
                                $('#kode_pos').addClass('is-invalid');
                                $('.errorKodePos').html(response.errors.kode_pos);
                            } else {
                                $('#kode_pos').removeClass('is-invalid');
                                $('.errorKodePos').html('');
                            }

                            if (response.errors.jalan) {
                                $('#jalan').addClass('is-invalid');
                                $('.errorJalan').html(response.errors.jalan);
                            } else {
                                $('#jalan').removeClass('is-invalid');
                                $('.errorJalan').html('');
                            }

                            if (response.errors.detail_alamat) {
                                $('#detail_alamat').addClass('is-invalid');
                                $('.errorDetailAlamat').html(response.errors.detail_alamat);
                            } else {
                                $('#detail_alamat').removeClass('is-invalid');
                                $('.errorDetailAlamat').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.success,
                            }).then(function() {
                                top.location.href = "{{ route('profile.index') }}";
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

        $('#provinsi').on('change', function() {
            let id_provinsi = $('#provinsi').val();

            $.ajax({
                type: "POST",
                url: "{{ route('alamat.get-kabupaten') }}",
                data: {
                    id_provinsi: id_provinsi
                },
                success: function(response) {
                    $('#kabupaten').html(response);
                    $('#kecamatan').html('');
                    $('#desa').html('');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });
        });

        $('#kabupaten').on('change', function() {
            let id_kabupaten = $('#kabupaten').val();

            $.ajax({
                type: "POST",
                url: "{{ route('alamat.get-kecamatan') }}",
                data: {
                    id_kabupaten: id_kabupaten
                },
                success: function(response) {
                    $('#kecamatan').html(response);
                    $('#desa').html('');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });
        });

        $('#kecamatan').on('change', function() {
            let id_kecamatan = $('#kecamatan').val();

            $.ajax({
                type: "POST",
                url: "{{ route('alamat.get-desa') }}",
                data: {
                    id_kecamatan: id_kecamatan
                },
                success: function(response) {
                    $('#desa').html(response);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });
        });
    </script>
@endsection
