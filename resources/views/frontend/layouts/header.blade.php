<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Neogym</title>


    {{-- here is how you add favicon in the website --}}
    <link rel="icon" href="{{ asset('frontend/images/u-1.png') }}">

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }} " />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />

</head>

<body>
    @php
    $gymnames=\App\Models\GymName::first();
    @endphp
    <div class="hero_area" style="background-image: url('{{ asset($slider) }}');">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="{{ asset('/') }}">
                        <span>
                            {{-- Neogym --}}
                            {{$gymnames->gymname}}
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">




                            <ul class="navbar-nav">
                                <li class="nav-item {{ request()->is('/') ? 'current' : '' }}">
                                    <a class="nav-link" href="{{ url('/') }}">{{$gymnames->home}}</a>
                                </li>
                                <li class="nav-item {{ request()->is('whyus') ? 'current' : '' }}">
                                    <a class="nav-link" href="{{ url('/whyus') }}">{{$gymnames->whyus}}</a>
                                </li>
                                <li class="nav-item {{ request()->is('trainer') ? 'current' : '' }}">
                                    <a class="nav-link" href="{{ url('/trainer') }}">{{$gymnames->trainers}}</a>
                                </li>
                                <li class="nav-item {{ request()->is('contact') ? 'current' : '' }}">
                                    <a class="nav-link" href="{{ url('/contact') }}">{{$gymnames->contactus}}</a>
                                </li>
                                <li class="nav-item {{ request()->is('login') ? 'current' : '' }}">
                                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                                </li>
                                <li class="nav-item {{ request()->is('register') ? 'current' : '' }}">
                                    <a class="nav-link" href="{{ url('/register') }}">Register</a>
                                </li>
                            </ul>
                            <div class="user_option">
                                <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        {{--
    </div> --}}
    <!-- end header section -->