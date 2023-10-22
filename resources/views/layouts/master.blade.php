<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div class="container-xxl bg-white p-0">
        @include('includes.header', ['active' => $active])

        @yield('content')

        @include('includes.footer')
    </div>
    <!-- JavaScript Libraries -->
    <script src={{ asset('lib/jquery.min.js') }}></script>
    <script src={{ asset('lib/wow.min.js') }}></script>
    <script src={{ asset('lib/easing.min.js') }}></script>
    <script src={{ asset('lib/waypoints.min.js') }}></script>
    <script src={{ asset('lib/owl.carousel.min.js') }}></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>
