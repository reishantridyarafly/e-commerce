<!doctype html>
<html lang="zxx">

<head>

    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title') - E-Commerce</title>

    <link rel="shortcut icon" href="{{ asset('frontend/assets') }}/img/favicon.png" type="images/x-icon" />

    <!-- css include -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/metisMenu.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/uikit.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/main.css">
</head>

<body>

    <div class="body_wrap">

        @include('layouts.frontend.header')

        <main>
            @yield('content')
        </main>

        @include('layouts.frontend.footer')
    </div>

    <!-- jquery include -->
    <script src="{{ asset('frontend/assets') }}/js/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/slick.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/backToTop.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/uikit.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/resize-sensor.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/theia-sticky-sidebar.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/wow.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/jqueryui.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/touchspin.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/countdown.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/metisMenu.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/main.js"></script>
</body>

</html>
