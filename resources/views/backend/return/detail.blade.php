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
                                                    {{ $returnProduct->checkout->kode_checkout }}</span>
                                            <p class="fs-13"><strong>Tanggal : </strong> <span class="float-end">
                                                    {{ \Carbon\Carbon::parse($returnProduct->checkout->tanggal_pembayaran)->translatedFormat('l, d F Y H:i:s') }}</span>
                                            </p>
                                            <p class="fs-13"><strong>Bukti Pembayaran : </strong> <span class="float-end">
                                                    <a href="{{ asset('storage/bukti_pembayaran/' . $returnProduct->checkout->bukti_pembayaran) }}"
                                                        target="_blank">Link Bukti Pembayaran</a></span></p>
                                            <p class="fs-13"><strong>Ekspedisi : </strong>
                                                <span class="float-end">{{ strtoupper($returnProduct->checkout->kurir) }} -
                                                    <b>
                                                        {{ $returnProduct->checkout->resi ? $returnProduct->checkout->resi : 'No Resi Belum Tersedia' }}</b></span>
                                            </p>

                                            <p class="fs-13"><strong>Status : </strong>
                                                @if ($returnProduct->checkout->status == 'pending')
                                                    <span
                                                        class="badge badge-outline-secondary rounded-pill float-end">Pending</span>
                                                @elseif ($returnProduct->checkout->status == 'process')
                                                    <span
                                                        class="badge badge-outline-primary rounded-pill float-end">Proses</span>
                                                @elseif ($returnProduct->checkout->status == 'completed')
                                                    <span
                                                        class="badge badge-outline-info rounded-pil float-end">Selesai</span>
                                                @elseif ($returnProduct->checkout->status == 'return')
                                                    <span
                                                        class="badge badge-outline-warning rounded-pil float-end">Pengembalian</span>
                                                @elseif ($returnProduct->checkout->status == 'failed')
                                                    <span
                                                        class="badge badge-outline-danger rounded-pill float-end">Gagal</span>
                                                @endif
                                            </p>
                                            <p class="fs-13"><strong>Status Pengembalian : </strong>
                                                @if ($returnProduct->status == 'pending')
                                                    <span
                                                        class="badge badge-outline-secondary rounded-pill float-end">Pending</span>
                                                @elseif ($returnProduct->status == 'process')
                                                    <span
                                                        class="badge badge-outline-primary rounded-pill float-end">Proses Pengembalian</span>
                                                @elseif ($returnProduct->status == 'completed')
                                                    <span
                                                        class="badge badge-outline-info rounded-pil float-end">Selesai</span>
                                                @elseif ($returnProduct->status == 'failed')
                                                    <span
                                                        class="badge badge-outline-danger rounded-pill float-end">Ditolak</span>
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
                                                        {{ 'Rp ' . number_format($returnProduct->checkout->ongkir, 0, ',', '.') }}
                                                    </td>
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
                                                        {{ 'Rp ' . number_format($subtotal + $returnProduct->checkout->ongkir, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row-->

                                <hr>
                                <div class="row">
                                    <div class="float-end mb-5">
                                        <h4 class="m-0 d-print-none">Bukti Pengembalian</h4>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            @foreach ($returnProduct->returnProductProofs as $proof)
                                                <div class="col-3 mb-4">
                                                    <a href="{{ asset('storage/uploads/returns/' . $proof->file_return) }}"
                                                        target="_blank">
                                                        <img class="w-100"
                                                            src="{{ asset('storage/uploads/returns/' . $proof->file_return) }}"
                                                            alt="Bukti Pengembalian - {{ $returnProduct->checkout->kode_checkout }}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="d-print-none mt-4">
                                    <div class="text-center">
                                        @if (auth()->user()->type == 'Administrator')
                                            @if ($returnProduct->status == 'pending')
                                                <button type="button" class="btn btn-danger me-1" id="btnTolak"
                                                    data-id="{{ $returnProduct->id }}"><i class="ri-close-line"></i>
                                                    Tolak</button>
                                                <button type="button" class="btn btn-primary" id="btnProses"
                                                    data-id="{{ $returnProduct->id }}"><i class="ri-restart-line"></i>
                                                    Proses</button>
                                            @endif
                                        @endif
                                        @if ($returnProduct->status == 'process')
                                            <button type="button" class="btn btn-success me-1" id="btnSelesai"
                                                data-id="{{ $returnProduct->id }}"><i class="ri-check-line"></i>
                                                Selesai</button>
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
                            url: "{{ route('return.failed') }}",
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
                Swal.fire({
                    title: 'Proses',
                    text: "Apakah anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, proses!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('return.process') }}",
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

            $('body').on('click', '#btnSelesai', function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Selesai',
                    text: "Apakah anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, selesai!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('return.completed') }}",
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
        })
    </script>
@endsection
