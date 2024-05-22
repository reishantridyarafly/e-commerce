@extends('layouts.backend.main')
@section('title', 'Rating')
@section('css')
    <!-- Datatables css -->
    <link href="{{ asset('backend/assets') }}/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets') }}/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />

    <style>
        .star {
            color: #FFD700;
            font-size: 20px;
        }

        .star:hover,
        .star.clicked {
            color: #FFD700;
        }
    </style>
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="1">#</th>
                                            <th>Nama</th>
                                            <th>Product</th>
                                            <th>Rating</th>
                                            <th>Komen</th>
                                            @if (auth()->user()->type == 'Pelanggan')
                                                <th width="20">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div> <!-- end row-->
                <!-- end card -->
            </div> <!-- container -->
        </div> <!-- content -->
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
                            <label for="nama" class="form-label">Product</label>
                            <input type="text" id="nama" name="nama" class="form-control" disabled>
                            <small class="text-danger errorNama"></small>
                        </div>
                        <div class="mb-2">
                            <label for="rating" class="form-label">Rating</label>
                            <div id="ratingStars"></div>
                            <input type="hidden" id="rating" name="rating">
                            <small class="text-danger errorRating"></small>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Komen</label>
                            <textarea name="comment" id="comment"rows="3" class="form-control"></textarea>
                            <small class="text-danger errorComment"></small>
                        </div>
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
    <!-- Datatables js -->
    <script src="{{ asset('backend/assets') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend/assets') }}/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('backend/assets') }}/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend/assets') }}/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js">
    </script>
    <script src="{{ asset('backend/assets') }}/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js">
    </script>
    <script src="{{ asset('backend/assets') }}/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js">
    </script>
    <script src="{{ asset('backend/assets') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend/assets') }}/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('backend/assets') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend/assets') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('backend/assets') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('backend/assets') }}/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('backend/assets') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="{{ asset('backend/assets') }}/js/pages/datatable.init.js"></script>

    <script>
        function generateStars(rating) {
            var starsHTML = '';
            for (var i = 1; i <= 5; i++) {
                if (i <= Math.round(rating)) {
                    starsHTML += '<i class="ri-star-fill star" data-rating="' + i +
                        '"></i>';
                } else if (i - rating <= 0.5) {
                    starsHTML += '<i class="ri-star-half-line star" data-rating="' + (i - 0.5) +
                        '"></i>';
                } else {
                    starsHTML += '<i class="ri-star-line star" data-rating="' + i +
                        '"></i>';
                }
            }
            return starsHTML;
        }

        var ratingStarsDiv = document.getElementById('ratingStars');
        ratingStarsDiv.innerHTML = generateStars(0);
        var selectedRating = 0;

        ratingStarsDiv.addEventListener('click', function(event) {
            if (event.target.classList.contains('star')) {
                selectedRating = parseFloat(event.target.getAttribute(
                    'data-rating'));
                document.getElementById('rating').value =
                    selectedRating;
                ratingStarsDiv.innerHTML = generateStars(
                    selectedRating);
                event.target.classList.add('clicked');
            }
        });

        ratingStarsDiv.addEventListener('mouseover', function(event) {
            if (event.target.classList.contains('star')) {
                event.target.classList.add('hovered');
            }
        });

        ratingStarsDiv.addEventListener('mouseleave', function(event) {
            ratingStarsDiv.innerHTML = generateStars(
                selectedRating);
            var stars = ratingStarsDiv.querySelectorAll('.star');
            stars.forEach(function(star) {
                star.classList.remove('hovered');
            });
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let columns = [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'product',
                    name: 'product'
                },
                {
                    data: 'ratings',
                    name: 'ratings'
                },
                {
                    data: 'comment',
                    name: 'comment'
                }
            ];

            @if (auth()->user()->type == 'Pelanggan')
                columns.push({
                    data: 'aksi',
                    name: 'aksi'
                });
            @endif

            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('rating.index') }}",
                columns: columns
            });

            $('body').on('click', '#btnRating', function() {
                $('#modalLabel').html("Rating Produk");
                $('#modal').modal('show');
                $('#form').trigger("reset");
                selectedRating = 0;
                ratingStarsDiv.innerHTML = generateStars(0);

                $('#nama').removeClass('is-invalid');
                $('.errorNama').html('');

                $('#id').val($(this).data('id'));
                $('#nama').val($(this).data('product'));
            });

            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ route('rating.store') }}",
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
                            if (response.errors.rating) {
                                $('#rating').addClass('is-invalid');
                                $('.errorRating').html(response.errors.rating);
                            } else {
                                $('#rating').removeClass('is-invalid');
                                $('.errorRating').html('');
                            }
                            if (response.errors.comment) {
                                $('#comment').addClass('is-invalid');
                                $('.errorComment').html(response.errors.comment);
                            } else {
                                $('#comment').removeClass('is-invalid');
                                $('.errorComment').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.message,
                            })
                            $('#modal').modal('hide');
                            $('#form').trigger("reset");
                            $('#datatable').DataTable().ajax.reload()
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
