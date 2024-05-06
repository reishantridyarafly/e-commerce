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
    <section class="about">
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

    <!-- about info start -->
    <section class="about-info pt-75 pb-100">
        <div class="container">
            <div class="about-info__wrap">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-5">
                        <div class="about-info__box">
                            <div class="about-info__item d-flex">
                                <span class="number">01</span>
                                <div class="content">
                                    <h4>highest succes rates</h4>
                                    <p>Lorem ipsum, or lipsum as it is some known, is dummy text used in</p>
                                </div>
                            </div>
                            <div class="about-info__item d-flex">
                                <span class="number">02</span>
                                <div class="content">
                                    <h4>Effective Team Work</h4>
                                    <p>Lorem ipsum, or lipsum as it is some known, is dummy text used in</p>
                                </div>
                            </div>
                            <div class="about-info__item d-flex">
                                <span class="number">03</span>
                                <div class="content">
                                    <h4>we grow business</h4>
                                    <p>Lorem ipsum, or lipsum as it is some known, is dummy text used in</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="about-info__tab-wrap pl-150">
                            <h2>How Analytics Helping Face Challenges</h2>
                            <p>“Analysis of the current business model, assessment of the company’s compet <br>
                                itiveness and market position, financial condition, as well as all possible</p>
                            <div class="about-info__tab mt-25">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                            aria-selected="true">About us</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">Objective</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                            aria-selected="false">Excellent</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane animated fadeInUp show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="about-info__tab-content">
                                            <ul class="about-info__tab-list list-unstyled">
                                                <li>Lorem Ipsum generators on the tend to repeat.</li>
                                                <li>If you are going to use a passage.</li>
                                                <li>Lorem Ipsum generators on the tend to repeat.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane animated fadeInUp" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="about-info__tab-content">
                                            <ul class="about-info__tab-list list-unstyled">
                                                <li>Lorem Ipsum generators on the tend to repeat.</li>
                                                <li>If you are going to use a passage.</li>
                                                <li>Lorem Ipsum generators on the tend to repeat.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane animated fadeInUp" id="contact" role="tabpanel"
                                        aria-labelledby="contact-tab">
                                        <div class="about-info__tab-content">
                                            <ul class="about-info__tab-list list-unstyled">
                                                <li>Lorem Ipsum generators on the tend to repeat.</li>
                                                <li>If you are going to use a passage.</li>
                                                <li>Lorem Ipsum generators on the tend to repeat.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about info end -->
@endsection
