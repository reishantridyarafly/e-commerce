@extends('layouts.backend.main')
@section('title', 'Edit Alamat')
@section('css')
    <!-- Select2 css -->
    <link href="{{ asset('backend/assets') }}/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')


    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('alamat.index') }}">Alamat</a></li>
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
                                        <input type="hidden" name="id" id="id" value="{{ $address->id }}">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="{{ $address->nama }}" autofocus>
                                        <small class="text-danger errorName"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="no_telepon" class="form-label">No Telepon</label>
                                        <input type="number" id="no_telepon" name="no_telepon"
                                            value="{{ $address->no_telepon }}" class="form-control">
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
                                                <option value="{{ $row->id }}"
                                                    {{ $row->id == $address->provinsi_id ? 'selected' : '' }}>
                                                    {{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger errorProvinsi"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="kota" class="form-label">Kota</label>
                                        <select name="kota" id="kota" class="form-control select2"
                                            data-toggle="select2">
                                            <option value="">-- Pilih Kota --</option>
                                        </select>
                                        <small class="text-danger errorKota"></small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="jalan" class="form-label">Jalan</label>
                                        <input type="text" name="jalan" id="jalan" class="form-control"
                                            value="{{ $address->jalan }}">
                                        <small class="text-danger errorJalan"></small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="detail_alamat" class="form-label">Detail Alamat</label>
                                        <textarea name="detail_alamat" id="detail_alamat" rows="3" class="form-control">{{ $address->detail_alamat }}</textarea>
                                        <small class="text-danger errorDetailAlamat"></small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="default_alamat" name="default_alamat" value="0"
                                                {{ $address->default_alamat == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="default_alamat">Atur sebagai alamat
                                                utama</label>
                                        </div>
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
@endsection
@section('javascript')
    <!--  Select2 Plugin Js -->
    <script src="{{ asset('backend/assets') }}/vendor/select2/js/select2.min.js"></script>
    <script>
        $('.select2').select2();

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let provinsiId = {{ $address->provinsi_id ?? 'null' }};

            if (provinsiId) {
                $('#provinsi').val(provinsiId).trigger('change');

                $.ajax({
                    type: "POST",
                    url: "{{ route('alamat.get-kota') }}",
                    data: {
                        id_provinsi: provinsiId
                    },
                    success: function(response) {
                        $('#kota').html(response);
                        let kotaId = {{ $address->kota_id ?? 'null' }};
                        $('#kota').val(kotaId).trigger('change');
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            }

            $('#form').submit(function(e) {
                e.preventDefault();
                let id = $('#id').val();
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ url('alamat/"+id+"') }}",
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

                            if (response.errors.kota) {
                                $('#kota').addClass('is-invalid');
                                $('.errorKota').html(response.errors.kota);
                            } else {
                                $('#kota').removeClass('is-invalid');
                                $('.errorKota').html('');
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
                                top.location.href = "{{ route('alamat.index') }}";
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });

            $('#provinsi').on('change', function() {
                let id_provinsi = $('#provinsi').val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('alamat.get-kota') }}",
                    data: {
                        id_provinsi: id_provinsi
                    },
                    success: function(response) {
                        $('#kota').html(response);
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
