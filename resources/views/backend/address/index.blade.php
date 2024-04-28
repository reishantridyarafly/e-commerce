@extends('layouts.backend.main')
@section('title', 'Alamat')
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
                        <div class="text-end">
                            <a href="{{ route('alamat.create') }}" class="btn btn-primary"><i
                                    class="ri-add-line me-1 fs-16 lh-1"></i>
                                Tambah alamat</a>
                        </div>
                        <div class="row">
                            @forelse ($address as $row)
                                <div class="col-md-6 mt-2">
                                    <div class="card border-primary border">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary">{{ $row->nama }} | {{ $row->no_telepon }}
                                            </h5>
                                            <p class="card-text">{{ $row->detail_alamat }}</p>
                                            <p class="card-text">{{ $row->village_name }}, {{ $row->district_name }},
                                                {{ $row->regency_name }}, {{ $row->province_name }}, {{ $row->kode_pos }}
                                            </p>
                                            <hr>
                                            <div class="row align-items-center">
                                                @if ($row->default_alamat == 0)
                                                    <div class="col">
                                                        <div class="text-start">
                                                            <h4><span
                                                                    class="badge bg-success-subtle text-success">Default</span>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col">
                                                    <div class="text-end">
                                                        <a href="{{ route('alamat.edit', $row->id) }}"
                                                            class="btn btn-warning btn-sm me-1">Edit</a>
                                                        <button type="button" id="btnDelete" class="btn btn-danger btn-sm"
                                                            data-id="{{ $row->id }}">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            @empty
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="text-center">
                                <h4>Alamat tidak tersedia</h4>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
                <!-- end card -->

            </div> <!-- container -->
        </div> <!-- content -->
    </div>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#btnDelete', function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Hapus',
                    text: "Apakah kamu yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('alamat/"+id+"') }}",
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Sukses',
                                        text: response.success,
                                    }).then(function() {
                                        top.location.href =
                                            "{{ route('alamat.index') }}";
                                    });
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                                    thrownError);
                            }
                        })
                    }
                })
            })
        });
    </script>
@endsection
