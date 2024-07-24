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
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />
    <style>
        /* Example CSS for styling the dashboard */
        .trainers_section,
        .why_us_section,
        .footer_info_section {
            margin-bottom: 30px;
        }

        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }

        .info_item img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            vertical-align: middle;
        }

        .info_item p {
            display: inline-block;
            vertical-align: middle;
            margin: 0;
        }

        /* Add styles for the active nav-item */
        .navbar-nav .nav-item .nav-link {
            position: relative;
            color: #000;
            text-decoration: none
        }

        .navbar-nav .nav-item.active .nav-link,
        .navbar-nav .nav-item.current .nav-link {
            color: #fb0808;
            text-decoration: none;
        }

        .navbar-nav .nav-item .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 3px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .navbar-nav .nav-item.active .nav-link::after,
        .navbar-nav .nav-item.current .nav-link::after {
            text-decoration: none;
            background-color: #f70404;
        }
    </style>
</head>

<body>
    @php
    $gymnames=\App\Models\GymName::first();
    @endphp
    <div class="hero_area" style="background-image: url('{{ asset($slider) }}');">
        <!-- header section starts -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
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
                                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/') }}">{{$gymnames->home}}</a>
                                </li>
                                <li class="nav-item {{ request()->is('whyus') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/whyus') }}">{{$gymnames->whyus}}</a>
                                </li>
                                <li class="nav-item {{ request()->is('trainer') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/trainer') }}">{{$gymnames->trainers}}</a>
                                </li>
                                <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/contact') }}">{{$gymnames->contactus}}</a>
                                </li>

                                {{-- NOTE: this below code shows logout nav if we are logged in and shows login and
                                register
                                when we are new user/not logged in --}}
                                @if (session()->has('id'))
                                <li class="nav-item {{ request()->is('logout') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('logoutUser') }}">Logout</a>
                                </li>
                                @else
                                <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                                </li>
                                <li class="nav-item {{ request()->is('register') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/register') }}">Register</a>
                                </li>
                                @endif
                            </ul>
                            <div class="user_option">
                                <form action="{{ route('search') }}" method="GET"
                                    class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                                    <input type="text" name="query" class="form-control mr-sm-2 border-dark"
                                        placeholder="Search..." value="{{ $search ?? '' }}">
                                    <button class="btn my-2 my-sm-0 nav_search-btn" type="submit"><i
                                            class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

</body>

</html>