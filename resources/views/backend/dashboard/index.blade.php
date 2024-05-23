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
            </div>
            <!-- container -->

        </div>
        <!-- content -->
    </div>
@endsection
