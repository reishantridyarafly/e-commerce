@extends('layouts.frontend.main')
@section('title', 'Kontak')
@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="radios-breadcrumb breadcrumbs">
                <ul class="list-unstyled d-flex align-items-center">
                    <li class="radiosbcrumb-item radiosbcrumb-begin">
                        <a href="index.html"><span>Home</span></a>
                    </li>
                    <li class="radiosbcrumb-item radiosbcrumb-end">
                        <span>Contact</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- contact info start -->
    <section class="contact-info">
        <div class="container">
            <div class="row justify-content-center mt-none-30">
                <div class="col-xl-3 col-lg-4 col-md-6 mt-30">
                    <div class="contact-info__item d-flex">
                        <span class="icon"><img src="{{ asset('frontend/assets') }}/img/icon/mail.svg" alt=""></span>
                        <div class="content">
                            <h3>Mail address</h3>
                            <a href="mailto:radios.info@gmail.com">radios.info@gmail.com</a>
                            <a href="tel:998757478492">+998757478492</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mt-30">
                    <div class="contact-info__item active d-flex">
                        <span class="icon"><img src="{{ asset('frontend/assets') }}/img/icon/location.svg" alt=""></span>
                        <div class="content">
                            <h3>Office Location</h3>
                            <p>4517 Washington Ave. Manch <br> ester, Kentucky 39495</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mt-30">
                    <div class="contact-info__item d-flex">
                        <span class="icon"><img src="{{ asset('frontend/assets') }}/img/icon/call-2.svg" alt=""></span>
                        <div class="content">
                            <h3>Phone Number</h3>
                            <a href="tel:404555012834">+405 - 555 - 0128 - 34</a>
                            <a href="tel:404555012863">+405 - 555 - 0128 - 63</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mt-30">
                    <div class="contact-info__item d-flex">
                        <span class="icon"><img src="{{ asset('frontend/assets') }}/img/icon/c_us.svg" alt=""></span>
                        <div class="content">
                            <h3>Connect Us</h3>
                            <a href="mailto:radios.info@gmail.com">radios.info@gmail.com</a>
                            <a href="mailto:radios.support@gmail.com">radios.support@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact info end -->

    <!-- contact start -->
    <section class="contact pt-90 mb-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="contact-img pos-rel">
                        <img src="{{ asset('frontend/assets') }}/img/contact/img_01.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-from__wrap pl-55">
                        <form class="contact-from" action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact-from__field">
                                        <input type="text" placeholder="Enter your name*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-from__field">
                                        <input type="email" placeholder="Enter your mail*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-from__field">
                                        <input type="number" placeholder="Enter your number*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-from__field">
                                        <input type="text" placeholder="Weabsite Link*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-from__field">
                                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your Massage*"></textarea>
                                    </div>
                                </div>
                                <div class="contact-from__chekbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="checkbox">
                                    <label for="checkbox">Save my name, email, and website in this browser for
                                        the next time I comment.</label>
                                </div>
                                <div class="contact-from__btn mt-35">
                                    <button class="thm-btn thm-btn__2">
                                        <span class="btn-wrap">
                                            <span>Send Messege</span>
                                            <span>Send Messege</span>
                                        </span>
                                        <i class="far fa-long-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact end -->
@endsection
