<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <?php
        // date_default_timezone_set('Asia/Amman');
        ?>
    <?php date_default_timezone_set('Asia/Aden'); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Medica') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- CSS only -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}


    <!-- Scripts -->
    @viteReactRefresh
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <script src="{{ asset('js/app.js') }}"></script>


    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">




    {{-- user_master --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}








    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('public/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">



    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid py-2 border-bottom d-none d-lg-block">

        <div class="row">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">

                    <a class="text-decoration-none text-body pe-3" href=""><i class="fa fa-phone"></i> 00962 787
                        109 976</a>
                    <span class="text-body">|</span>
                    <a class="text-decoration-none text-body px-3" href=""><i class="fa fa-envelope"></i>
                        support@medica.com</a>
                    <span class="text-body"> | </span>
                    <a class="text-decoration-none text-body px-3" href=""><i class="fa fa-calendar-plus-o"></i>
                        {{ date('H:i') }} {{ date('l') }} {{ date('Y-m-d') }}</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-2" href="https://web.facebook.com/?_rdc=1&_rdr" target="_blanck">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-2" href="https://twitter.com/?lang=en" target="_blanck">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a class="text-body px-2" href="https://www.instagram.com/accounts/login/" target="_blanck">
                        <i class="fab fa-instagram"></i>
                    </a>

                </div>
            </div>
        </div>

    </div>
    <!-- Topbar End -->




    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm px-0">

        <nav class="navbar navbar-expand-lg bg-white navbar-light   py-lg-0">

            <a href="{{ url('/') }}" class="navbar-brand">
                <h1 class="m-0 text-uppercase text-primary"> <span style="color: #A5C422"> M</span>EDICA</h1>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item"><a href='/' class="nav-link">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/aboutUs">About Us</a></li>   
                    <li class="nav-item"><a href="/contactUs" class="nav-link">Contact</a></li>

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->national_id }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <a class="dropdown-item"
                                    @if (Auth::user()->user_role === 2) href="{{ route('userprofile.index') }}" @endif
                                    @if (Auth::user()->user_role === 1) href="{{ route('userprofileAdmin.index') }}" @endif
                                    @if (Auth::user()->user_role === 3) href="{{ route('userprofileDoctor.index') }}" @endif>My
                                    Profile</a>

                                <a class="dropdown-item" @if (Auth::user()->user_role === 1) href="/admin_dashboard" @endif
                                    @if (Auth::user()->user_role === 2) href="/user_dashboard" @endif
                                    @if (Auth::user()->user_role === 3) href="/doctor_dashboard" @endif>Dashboard</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @endguest
                </ul>
            </div>
        </nav>
        @yield('content')

    </div>
    <!-- Navbar End -->
