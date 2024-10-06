@extends('layouts.backend.main')
@section('title', 'Detail Transaksi')
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
                                    <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Transaksi</a></li>
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

                                <!-- Invoice Logo-->
                                <div class="clearfix">
                                    <div class="float-start mb-3">
                                        <img src="{{ asset('backend/assets') }}/images/logo.png" alt="dark logo"
                                            height="70">
                                    </div>
                                    <div class="float-end">
                                        <h4 class="m-0 d-print-none">Detail Transaksi</h4>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <!-- Invoice Detail-->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="fs-14">Alamat Pengiriman :</h6>
                                            <address>
                                                {{ $address->nama }}<br>
                                                {{ $address->detail_alamat }}<br>
                                                {{ strtoupper($address->city_name) }},
                                                {{ strtoupper($address->province_name) }},
                                                {{ strtoupper($address->kode_pos) }}<br>
                                                {{ $address->no_telepon }}
                                            </address>
                                        </div><!-- end col -->
                                        <div class="col-sm-5 offset-sm-3">
                                            <p class="fs-13"><strong>Kode Transaksi : </strong><span class="float-end">
                                                    {{ $checkout->kode_checkout }}</span>
                                            <p class="fs-13"><strong>Tanggal : </strong> <span class="float-end">
                                                    {{ \Carbon\Carbon::parse($checkout->tanggal_pembayaran)->translatedFormat('l, d F Y H:i:s') }}</span>
                                            </p>
                                            <p class="fs-13"><strong>Bukti Pembayaran : </strong> <span class="float-end">
                                                    <a href="{{ asset('storage/bukti_pembayaran/' . $checkout->bukti_pembayaran) }}"
                                                        target="_blank">Link Bukti Pembayaran</a></span></p>
                                            <p class="fs-13"><strong>Ekspedisi : </strong>
                                                <span class="float-end">{{ strtoupper($checkout->kurir) }} -
                                                    <b>
                                                        {{ $checkout->resi ? $checkout->resi : 'No Resi Belum Tersedia' }}</b></span>
                                            </p>

                                            <p class="fs-13"><strong>Status : </strong>
                                                @if ($checkout->status == 'pending')
                                                    <span
                                                        class="badge badge-outline-secondary rounded-pill float-end">Pending</span>
                                                @elseif ($checkout->status == 'process')
                                                    <span
                                                        class="badge badge-outline-primary rounded-pill float-end">Proses</span>
                                                @elseif ($checkout->status == 'completed')
                                                    <span
                                                        class="badge badge-outline-info rounded-pil float-end">Selesai</span>
                                                @elseif ($checkout->status == 'failed')
                                                    <span
                                                        class="badge badge-outline-danger rounded-pill float-end">Gagal</span>
                                                @endif
                                            </p>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <hr>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-sm table-centered table-hover table-borderless mb-0 mt-3">
                                                <thead class="border-top border-bottom bg-light-subtle border-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Item</th>
                                                        <th>Harga</th>
                                                        <th>Quantity</th>
                                                        <th class="text-end">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($items as $row)
                                                        <tr>
                                                            <td class="">{{ $loop->iteration }}</td>
                                                            <td>{{ $row->product->nama }}</td>
                                                            <td>{{ 'Rp ' . number_format($row->harga, 0, ',', '.') }}</td>
                                                            <td>{{ $row->quantity }}</td>
                                                            <td class="text-end">
                                                                {{ 'Rp ' . number_format($row->quantity * $row->harga, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <div class="float-end mt-3 mt-sm-0">
                                            <table>
                                                <tr>
                                                    <th>
                                                        <h4>Subtotal</h4>
                                                    </th>
                                                    <td width="30" class="text-center">
                                                        <h4>:</h4>
                                                    </td>
                                                    <td width="130" class="text-end" style="font-size: 15px">
                                                        {{ 'Rp ' . number_format($subtotal, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <h4>Ongkos Kirim</h4>
                                                    </th>
                                                    <td width="30" class="text-center">
                                                        <h4>:</h4>
                                                    </td>
                                                    <td width="130" class="text-end" style="font-size: 15px">
                                                        {{ 'Rp ' . number_format($checkout->ongkir, 0, ',', '.') }}</td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <h4>
                                                            Total
                                                        </h4>
                                                    </th>
                                                    <td width="30" class="text-center">
                                                        <h4>:</h4>
                                                    </td>
                                                    <td width="130" class="text-end" style="font-size: 15px">
                                                        {{ 'Rp ' . number_format($subtotal + $checkout->ongkir, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row-->


                                <div class="d-print-none mt-4">
                                    <div class="text-center">
                                        @if (auth()->user()->type == 'Administrator')
                                            @if ($checkout->status == 'pending')
                                                <button type="button" class="btn btn-danger me-1" id="btnTolak"
                                                    data-id="{{ $checkout->id }}"><i class="ri-close-line"></i>
                                                    Tolak</button>
                                                <button type="button" class="btn btn-primary" id="btnProses"
                                                    data-id="{{ $checkout->id }}"><i class="ri-restart-line"></i>
                                                    Proses</button>
                                            @endif
                                            @if ($checkout->status == 'process' && $checkout->resi == null)
                                                <button type="button" class="btn btn-primary me-1" id="btnUpdateResi"><i
                                                        class="ri-pencil-line"></i>
                                                    Update Resi</button>
                                            @endif
                                        @endif
                                        @if ($checkout->status == 'process' && $checkout->resi != null)
                                            <button type="button" class="btn btn-success me-1" id="btnSelesai"><i
                                                    class="ri-check-line"></i>
                                                Selesai</button>
                                        @endif
                                        @if ($checkout->status == 'completed')
                                            <button type="button" onclick="javascript:window.print()"
                                                class="btn btn-primary"><i class="ri-printer-line"></i> Print</button>
                                        @endif

                                    </div>
                                </div>
                                <!-- end buttons -->


                            </div> <!-- end card-body-->
                        </div> <!-- end card -->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->
                <!-- end card -->
            </div> <!-- container -->
        </div> <!-- content -->
    </div>

    <!-- modal -->
    <div id="modalResi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalResiLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formResi">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalResiLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="id" id="id" value="{{ $checkout->id }}">
                            <label for="no_resi" class="form-label">No Resi</label>
                            <input type="text" id="no_resi" name="no_resi" class="form-control" autofocus>
                            <small class="text-danger errorNoResi"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="simpanResi">Simpan</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- modal -->
    <div id="modalSelesai" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalSelesaiLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formSelesai">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalSelesaiLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="id" id="id" value="{{ $checkout->id }}">
                            <label for="bukti_penerimaan" class="form-label">Foto Barang (Opsional)</label>
                            <input type="file" id="bukti_penerimaan" name="bukti_penerimaan" class="form-control"
                                accept="image/*" autofocus>
                            <small class="text-danger errorBuktiPenerimaan"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="simpanSelesai">Simpan</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#btnTolak', function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Tolak',
                    text: "Apakah anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, tolak!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('transaksi.tolak') }}",
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Sukses',
                                    text: response.message,
                                }).then(function() {
                                    window.location.href = window.location.href;
                                });
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log(xhr.status + "\n" + xhr.responseText +
                                    "\n" +
                                    thrownError);
                            }
                        })
                    }
                })
            })

            $('body').on('click', '#btnProses', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('transaksi.proses') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response.message,
                        }).then(function() {
                            window.location.href = window.location.href;
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status + "\n" + xhr.responseText +
                            "\n" +
                            thrownError);
                    }
                })
            })

            $('body').on('click', '#btnUpdateResi', function() {
                $('#modalResiLabel').html("Update Resi");
                $('#modalResi').modal('show');
                $('#formResi').trigger("reset");

                $('#noResi').removeClass('is-invalid');
                $('.errorNoResi').html('');
            });

            $('#formResi').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ route('transaksi.updateResi') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#simpanResi').attr('disable', 'disabled');
                        $('#simpanResi').text('Proses...');
                    },
                    complete: function() {
                        $('#simpanResi').removeAttr('disable');
                        $('#simpanResi').html('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.no_resi) {
                                $('#no_resi').addClass('is-invalid');
                                $('.errorNoResi').html(response.errors.no_resi);
                            } else {
                                $('#no_resi').removeClass('is-invalid');
                                $('.errorNoResi').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.message,
                            }).then(function() {
                                $('#modalResi').modal('hide');
                                $('#formResi').trigger("reset");
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

            $('body').on('click', '#btnSelesai', function() {
                $('#modalSelesaiLabel').html("Bukti Penerimaan");
                $('#modalSelesai').modal('show');
                $('#formSelesai').trigger("reset");

                $('#bukti_penerimaan').removeClass('is-invalid');
                $('.errorBuktiPenerimaan').html('');
            })

            $('#formSelesai').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: new FormData(this),
                    url: "{{ route('transaksi.selesai') }}",
                    type: "POST",
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        $('#simpanSelesai').attr('disable', 'disabled');
                        $('#simpanSelesai').text('Proses...');
                    },
                    complete: function() {
                        $('#simpanSelesai').removeAttr('disable');
                        $('#simpanSelesai').html('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.bukti_penerimaan) {
                                $('#bukti_penerimaan').addClass('is-invalid');
                                $('.errorBuktiPenerimaan').html(response.errors
                                    .bukti_penerimaan);
                            } else {
                                $('#bukti_penerimaan').removeClass('is-invalid');
                                $('.errorBuktiPenerimaan').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.message,
                            }).then(function() {
                                $('#modalSelesai').modal('hide');
                                $('#formSelesai').trigger("reset");
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
        })
    </script>
@endsection
