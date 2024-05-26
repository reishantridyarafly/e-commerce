@extends('layouts.backend.main')
@section('title', 'Pengaturan Banner')
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
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                </ol>
                            </div>
                            <h4 class="page-title">@yield('title')</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="card">
                    <div class="card-body border-secondary border">
                        <div class="col-xl-12 col-sm-6 mt-3">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <div class="card-widgets">
                                        <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                        <a data-bs-toggle="collapse" href="#card-collapse2" role="button"
                                            aria-expanded="false" aria-controls="card-collapse2"><i
                                                class="ri-subtract-line"></i></a>
                                    </div>
                                    <h5 class="card-title mb-0">Banner</h5>
                                </div>
                                <div id="card-collapse2" class="collapse show">
                                    <div class="card-body">
                                        <img src="{{ asset('backend/assets/images/banner-2.png') }}" alt=""
                                            style="width: 100%;">
                                        <div class="text-end">
                                            <button type="button" class="btn btn-primary btn-sm m-2 banner"
                                                data-banner_id="1">
                                                <i class="mdi mdi-pencil"></i> Update Banner
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end card -->

                </div> <!-- container -->
            </div> <!-- content -->
        </div>
    </div>

    <!-- modal -->
    <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="id" id="id">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" id="title" name="title" class="form-control" autofocus>
                            <small class="text-danger errorTitle"></small>
                        </div>
                        <div class="mb-3">
                            <label for="product" class="form-label">Produk</label>
                            <select name="product" id="product" class="form-control select2" data-toggle="select2">
                                <option value="">-- Pilih Produk --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->nama }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger errorProduct"></small>
                        </div>
                        <input type="hidden" name="banner_id" id="banner_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('javascript')
    <script src="{{ asset('backend/assets') }}/vendor/select2/js/select2.min.js"></script>
    <script>
        $('.select2').select2({
            dropdownParent: $('.select2')
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.banner').click(function() {
                $('#id').val('');
                $('#banner_id').val($(this).data('banner_id'));
                $('#modalLabel').html("Update Banner");
                $('#modal').modal('show');
                $('#form').trigger("reset");

                $('#title').removeClass('is-invalid');
                $('.errorTitle').html('');

                $('#product').removeClass('is-invalid');
                $('.errorProduct').html('');
            });

            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ route('banner.store') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#simpan').attr('disable', 'disabled');
                        $('#simpan').text('Proses...');
                    },
                    complete: function() {
                        $('#simpan').removeAttr('disable');
                        $('#simpan').html('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.title) {
                                $('#title').addClass('is-invalid');
                                $('.errorTitle').html(response.errors.title);
                            } else {
                                $('#title').removeClass('is-invalid');
                                $('.errorTitle').html('');
                            }

                            if (response.errors.product) {
                                $('#product').addClass('is-invalid');
                                $('.errorProduct').html(response.errors.product);
                            } else {
                                $('#product').removeClass('is-invalid');
                                $('.errorProduct').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Data berhasil disimpan',
                            }).then(function() {
                                $('#modal').modal('hide');
                                $('#form').trigger("reset");
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
