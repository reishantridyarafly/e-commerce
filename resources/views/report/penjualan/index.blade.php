@extends('layouts.backend.main')
@section('title', 'Laporan Penjualan')
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
                    <div class="card-body">
                        <form action="{{ route('laporan_penjualan.print') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                                        <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                                        <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary" name="action" value="excel" type="submit"><i class="ri-file-excel-line"></i>
                                        Cetak Excel</button>
                                    <button class="btn btn-danger" name="action" value="pdf" type="submit"><i class="ri-file-pdf-line"></i>
                                        Cetak PDF</button>
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
