@extends('layouts.backend.main')
@section('title', 'Dashboard')
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Selamat datang!</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('dashboard.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="date" name="start_date" class="form-control" placeholder="Tanggal Mulai">
                                <input type="date" name="end_date" class="form-control" placeholder="Tanggal Akhir">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xxl-3 col-sm-6">
                        <div class="card widget-flat text-bg-pink">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="ri-user-line widget-icon"></i>
                                </div>
                                <h6 class="text-uppercase mt-0" title="Customers">Pelanggan</h6>
                                <h2 class="my-2">{{ $count_users }}</h2>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-xxl-3 col-sm-6">
                        <div class="card widget-flat text-bg-purple">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="ri-box-3-line widget-icon"></i>
                                </div>
                                <h6 class="text-uppercase mt-0" title="Customers">Produk</h6>
                                <h2 class="my-2">{{ $count_product }}</h2>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-xxl-3 col-sm-6">
                        <div class="card widget-flat text-bg-info">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="ri-shopping-basket-line widget-icon"></i>
                                </div>
                                <h6 class="text-uppercase mt-0" title="Customers">Transaksi</h6>
                                <h2 class="my-2">{{ $count_transaction_completed }}</h2>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-xxl-3 col-sm-6">
                        <div class="card widget-flat text-bg-primary">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="ri-wallet-2-line widget-icon"></i>
                                </div>
                                <h6 class="text-uppercase mt-0" title="Customers">Total Penjualan</h6>
                                <h2 class="my-2">{{ 'Rp ' . number_format($totalHarga, 0, ',', '.') }}</h2>
                            </div>
                        </div>
                    </div> <!-- end col-->
                </div>

                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-widgets">
                                    <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                    <a data-bs-toggle="collapse" href="#weeklysales-collapse" role="button"
                                        aria-expanded="false" aria-controls="weeklysales-collapse"><i
                                            class="ri-subtract-line"></i></a>
                                    <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                </div>
                                <h5 class="header-title mb-0">Pendapatan Bulanan</h5>

                                <div id="weeklysales-collapse" class="collapse pt-3 show">
                                    <div dir="ltr">
                                        <div id="chart_month" class="apex-charts">
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-widgets">
                                    <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                    <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button"
                                        aria-expanded="false" aria-controls="yearly-sales-collapse"><i
                                            class="ri-subtract-line"></i></a>
                                    <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                </div>
                                <h5 class="header-title mb-0">Transaksi Terbaru</h5>

                                <div id="yearly-sales-collapse" class="collapse pt-3 show">
                                    <table class="table">
                                        <tr>
                                            <th>Kode</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                        @forelse ($checkouts_take as $row)
                                            <tr>
                                                <td>{{ $row->kode_checkout }}</td>
                                                <td>{{ $row->tanggal_pembayaran }}</td>
                                                <td>
                                                    @if ($row->status == 'pending')
                                                        <span
                                                            class="badge badge-outline-secondary rounded-pill float-end">Pending</span>
                                                    @elseif ($row->status == 'process')
                                                        <span
                                                            class="badge badge-outline-primary rounded-pill float-end">Proses</span>
                                                    @elseif ($row->status == 'completed')
                                                        <span
                                                            class="badge badge-outline-info rounded-pil float-end">Selesai</span>
                                                    @elseif ($row->status == 'return')
                                                        <span
                                                            class="badge badge-outline-warning rounded-pil float-end">Pengembalian</span>
                                                    @elseif ($row->status == 'failed')
                                                        <span
                                                            class="badge badge-outline-danger rounded-pill float-end">Gagal</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">Data tidak tersedia</td>
                                            </tr>
                                        @endforelse
                                    </table>
                                </div>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                </div>
                <!-- end row -->
            </div>
            <!-- container -->

        </div>
        <!-- content -->
    </div>
@endsection


@section('javascript')
    <script>
        var monthlyRevenue = @json($monthlyRevenue);

        var months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
        var data = new Array(12).fill(0);

        monthlyRevenue.forEach(function(item) {
            data[item.month - 1] = item.total;
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }


        new ApexCharts(document.querySelector("#chart_month"), {
            chart: {
                type: "bar",
                height: 370,
                toolbar: {
                    show: false
                }
            },
            series: [{
                name: "Pendapatan",
                data: data
            }],
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: "rounded",
                    columnWidth: "30%"
                }
            },
            dataLabels: {
                enabled: false,
                offsetX: -6,
                style: {
                    fontSize: "12px",
                    colors: ["#fff"]
                }
            },
            stroke: {
                show: false,
                width: 1,
                colors: ["#fff"]
            },
            colors: ["#DB4540"],
            xaxis: {
                categories: months,
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: "#64748b",
                        fontFamily: "Inter"
                    }
                }
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return formatRupiah(value, 'Rp ');
                    },
                    style: {
                        color: "#64748b",
                        fontFamily: "Inter"
                    }
                }
            },
            grid: {
                strokeDashArray: 3,
                borderColor: "#e9ecef"
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        return formatRupiah(value, 'Rp ');
                    }
                },
                style: {
                    colors: "#64748b",
                    fontFamily: "Inter"
                }
            },
            legend: {
                show: false,
                fontFamily: "Inter",
                labels: {
                    colors: "#64748b"
                }
            }
        }).render();
    </script>
@endsection
