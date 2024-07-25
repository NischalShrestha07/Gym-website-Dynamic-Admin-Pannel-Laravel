<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dazzel's Gym Admin Pannel</title>
    <link rel="icon" href="{{ asset('frontend/images/u-1.png') }}">

    <link rel="stylesheet" href="Dashboard/css/vertical-layout-light/style.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="/">DAZZEL GYM</a>
                {{-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="Dashboard/images/logo-mini.svg"
                        alt="logo" /></a> --}}
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>


            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">


            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#home-section" aria-expanded="false"
                            aria-controls="home-section">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Home</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="home-section">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ url('/adminDatas') }}">View All</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#why-us-section" aria-expanded="false"
                            aria-controls="why-us-section">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Why Us</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="why-us-section">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ url('/whyuss') }}">View All</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#trainers-section" aria-expanded="false"
                            aria-controls="trainers-section">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Our Trainers</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="trainers-section">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="/trainers">View All</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#footerbar-section" aria-expanded="false"
                            aria-controls="footerbar-section">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Footerbar</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="footerbar-section">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="/footerbars">View All</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#gymnames-section" aria-expanded="false"
                            aria-controls="gymnames-section">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Change Gym Names</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="gymnames-section">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="/gymnames">View All</a></li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </nav>