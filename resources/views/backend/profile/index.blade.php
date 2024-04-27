@extends('layouts.backend.main')
@section('title', 'Profile')
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="profile-bg-picture"
                            style="background-image:url('{{ asset('assets') }}/images/bg-profile.jpg')">
                            <span class="picture-bg-overlay"></span>
                            <!-- overlay -->
                        </div>
                        <!-- meta -->
                        <div class="profile-user-box">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="profile-user-img"><img
                                            src="{{ auth()->user()->avatar == '' ? 'https://ui-avatars.com/api/?background=random&name=' . auth()->user()->first_name . ' ' . auth()->user()->last_name : asset('storage/avatar/' . auth()->user()->avatar) }}"
                                            alt="" class="avatar-lg rounded-circle"></div>
                                    <div class="">
                                        <h4 class="mt-4 fs-17 ellipsis">
                                            {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h4>
                                        <p class="font-13">{{ auth()->user()->bio ? auth()->user()->bio : '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ meta -->
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card p-0">
                            <div class="card-body p-0">
                                <div class="profile-content">
                                    <ul class="nav nav-underline nav-justified gap-0">
                                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                                data-bs-target="#aboutme" type="button" role="tab" aria-controls="home"
                                                aria-selected="true" href="#aboutme">Tentang</a>
                                        </li>

                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                data-bs-target="#settings" type="button" role="tab"
                                                aria-controls="home" aria-selected="true" href="#settings">Pengaturan</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                data-bs-target="#password" type="button" role="tab"
                                                aria-controls="home" aria-selected="true" href="#password">Ganti
                                                Password</a></li>
                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                data-bs-target="#delete" type="button" role="tab" aria-controls="home"
                                                aria-selected="true" href="#delete">Hapus Akun</a></li>
                                    </ul>

                                    <div class="tab-content m-0 p-4">
                                        @include('backend.profile.about')

                                        @include('backend.profile.settings')

                                        @include('backend.profile.password')

                                        @include('backend.profile.delete')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

            </div>
            <!-- end row -->

        </div>
        <!-- container -->

    </div>
    <!-- content -->
@endsection
