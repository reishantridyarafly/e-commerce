<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="{{ csrf_token() }}" name="csrf-token">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets') }}/images/favicon.png" />

    <!-- Theme Config Js -->
    <script src="{{ asset('backend/assets') }}/js/config.js"></script>

    <!-- App css -->
    <link href="{{ asset('backend/assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('backend/assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg position-relative">
    
    @yield('content')

    <footer class="footer footer-alt fw-medium">
        <span class="text-dark">
            <script>
                document.write(new Date().getFullYear())
            </script> © {{ config('app.name') }} - by <b>Rio Akbar Turmuzi </b>
        </span>
    </footer>
    <!-- Vendor js -->
    <script src="{{ asset('backend/assets') }}/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('backend/assets') }}/js/app.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('javascript')
</body>

</html>
