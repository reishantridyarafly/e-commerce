@extends('layouts.frontend.main')
@section('title', 'Tentang')
@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="radios-breadcrumb breadcrumbs">
                <ul class="list-unstyled d-flex align-items-center">
                    <li class="radiosbcrumb-item radiosbcrumb-begin">
                        <a href="{{ route('beranda.index') }}"><span>Beranda</span></a>
                    </li>
                    <li class="radiosbcrumb-item radiosbcrumb-end">
                        <span>Tentang</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- about start -->
    <section class="about pb-100">
        <div class="container">
            <div class="row g-0 align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="about__img">
                        <img src="{{ asset('frontend/assets') }}/img/about/img_01.jpg" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about__content pl-70">
                        <h2>More Than 25+ Years We <br> Provide True News</h2>
                        <p>Meet my startup design agency Shape Rex Currently I am working <br> CodeNext as
                            Product Designer. elit. Placeat qui ducimus</p>
                        <ul class="about__list list-unstyled mt-25">
                            <li>Lorem Ipsum generators on the tend to repeat.</li>
                            <li> If you are going to use a passage.</li>
                        </ul>
                        <div class="about__btn mt-30">
                            <a class="thm-btn thm-btn__2" href="#!">
                                <span class="btn-wrap">
                                    <span>Discover More</span>
                                    <span>Discover More</span>
                                </span>
                                <i class="far fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about end -->
@endsection
