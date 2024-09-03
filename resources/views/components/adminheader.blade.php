<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Royal Power's Gym Admin Pannel</title>
    <link rel="icon" href="{{ asset('frontend/images/u-1.png') }}">

    <link rel="stylesheet" href="Dashboard/css/vertical-layout-light/style.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5 navbar" href="/">
                    <h3 class="ml-5">Royal Power GYM</h3>
                </a>
                {{-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="Dashboard/images/logo-mini.svg"
                        alt="logo" /></a> --}}
            </div>

            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary m-4">Back</a>



            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">


            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/manageAdmin') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title" style="font-size: 1.25rem;">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#home-section" aria-expanded="false"
                            aria-controls="home-section">
                            <i class="icon-layout menu-icon text-danger"></i>
                            <span class="menu-title" style="font-size: 1.25rem;">Manage Home</span>

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
                            <span class="menu-title" style="font-size: 1.25rem;">Manage Why Us</span>

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
                            <span class="menu-title" style="font-size: 1.25rem;">Manage Trainers</span>

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
                            <span class="menu-title" style="font-size: 1.25rem;"> Manage Footer</span>

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
                            <span class="menu-title" style="font-size: 1.25rem;">Manage Navbar</span>


                        </a>
                        <div class="collapse" id="gymnames-section">
                            <ul class="nav flex-column sub-menu">
                                <a class="nav-item nav-link fw-2 rounded text-center p-2 text-white mr-4"
                                    href="/gymnames">View
                                    All</a>
                                {{-- <li class="nav-item bg-success rounded"><a class="nav-link" href="/gymnames">View
                                        All</a></li> --}}
                            </ul>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#contacts-section" aria-expanded="false"
                            aria-controls="contacts-section">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Message Details</span>

                        </a>
                        <div class="collapse" id="contacts-section">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="/contacts">View All</a></li>
                            </ul>
                        </div>
                    </li> --}}

                </ul>
            </nav>
