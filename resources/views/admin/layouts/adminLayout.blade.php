<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 May 2024 05:15:42 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{Auth::user()->name}}({{Auth::user()->role}})</title>
    {{-- ICON IS WORKING --}}
    <link rel="icon" href="{{ asset('images/u-1.png') }}">
    <base href="{{ asset('admincss') }}/" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">



    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">

    <link rel="stylesheet" href="dist/css/adminlte.min2167.css?v=3.2.0">

    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        // Fade in the alert on page load
        let alertBox = document.querySelectorAll('.custom-alert');

        // Automatically fade out after 5 seconds
        setTimeout(function() {
            alertBox.forEach(function(alert) {
                alert.classList.add('fade-out');
            });
        }, 5000); // 5 seconds

        // Remove the alert from the DOM after the fade-out transition completes
        setTimeout(function() {
            alertBox.forEach(function(alert) {
                alert.remove();
            });
        }, 5500); // 5 seconds + 0.5s for fade-out effect
    });
    </script>
    {{-- /////TOKEN RELATED IMPORTANT POINTS --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    @yield('customCss')
    <!-- Custom CSS for smoother animation and better styling -->
    <style>
        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
            border-radius: 5px;
            padding: 20px;
            max-width: 300px;
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.5s ease-out;
        }

        .custom-alert.fade-in {
            opacity: 1;
            transform: translateX(0);
        }

        .custom-alert.fade-out {
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.5s ease-in;
        }

        .alert strong {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .close {
            font-size: 1.2rem;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img style="border-radius: 100px;" class="animation__shake" src="{{asset('admincss/dist/img/royal2.webp')}}"
                alt="Gym Logo" height="150" width="150">
        </div>

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('adminDash') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('admin.contacts.index')}}" class="nav-link">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" id="notifications-toggle">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge" id="notification-count">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- Notification Items -->
                        <a href="#" class="dropdown-item">
                            <div class="media align-items-center">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media align-items-center">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media align-items-center">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <!-- Fullscreen Toggle in Notifications -->
                        <a href="#" class="dropdown-item" id="fullscreen-notification-toggle">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Toggle Fullscreen
                                        <span class="float-right text-sm"><i class="fas fa-expand-arrows-alt"
                                                id="fullscreen-icon"></i></span>
                                    </h3>
                                    <p class="text-sm text-muted">Click to toggle fullscreen mode</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

                <!-- JavaScript for both dropdown and fullscreen functionality -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                    // Fullscreen functionality for both triggers
                    const fullscreenTriggers = [
                        document.getElementById('fullscreen-toggle'), // From previous nav item
                        document.getElementById('fullscreen-notification-toggle')
                    ];
                    const fullscreenIcon = document.getElementById('fullscreen-icon');

                    fullscreenTriggers.forEach(trigger => {
                        if (trigger) {
                            trigger.addEventListener('click', function(e) {
                                e.preventDefault();
                                toggleFullscreen();
                            });
                        }
                    });

                    function toggleFullscreen() {
                        if (!document.fullscreenElement) {
                            document.documentElement.requestFullscreen().catch(err => {
                                console.error(`Error attempting to enable fullscreen: ${err.message}`);
                            });
                        } else {
                            document.exitFullscreen();
                        }
                    }

                    // Update icon based on fullscreen state
                    document.addEventListener('fullscreenchange', function() {
                        if (fullscreenIcon) {
                            if (document.fullscreenElement) {
                                fullscreenIcon.classList.remove('fa-expand-arrows-alt');
                                fullscreenIcon.classList.add('fa-compress-arrows-alt');
                            } else {
                                fullscreenIcon.classList.remove('fa-compress-arrows-alt');
                                fullscreenIcon.classList.add('fa-expand-arrows-alt');
                            }
                        }
                    });

                    // Optional: Notification count animation
                    const notificationToggle = document.getElementById('notifications-toggle');
                    const notificationCount = document.getElementById('notification-count');

                    if (notificationToggle && notificationCount) {
                        notificationToggle.addEventListener('click', function() {
                            notificationCount.classList.add('animate__animated', 'animate__pulse');
                            setTimeout(() => {
                                notificationCount.classList.remove('animate__animated', 'animate__pulse');
                            }, 1000);
                        });
                    }
                });
                </script>

                <!-- Optional CSS enhancements -->
                <style>
                    .dropdown-menu-lg {
                        min-width: 350px;
                        padding: 0.5rem 0;
                    }

                    .dropdown-item {
                        padding: 0.75rem 1.25rem;
                        transition: background-color 0.2s ease;
                    }

                    .dropdown-item:hover {
                        background-color: #f8f9fa;
                    }

                    .media-body h3 {
                        margin-bottom: 0.25rem;
                        font-size: 1rem;
                    }

                    .navbar-badge {
                        position: absolute;
                        top: 5px;
                        right: 5px;
                        font-size: 0.7rem;
                        padding: 0.25em 0.5em;
                    }

                    .dropdown-footer {
                        text-align: center;
                        background-color: #f8f9fa;
                    }
                </style>



                <li class="nav-item">
                    <a class="nav-link" href="#" id="fullscreen-toggle" role="button" aria-label="Toggle fullscreen">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <!-- Add this JavaScript at the end of your file or in a script tag -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                    const fullscreenToggle = document.getElementById('fullscreen-toggle');

                    fullscreenToggle.addEventListener('click', function(e) {
                        e.preventDefault();

                        if (!document.fullscreenElement) {
                            // Enter fullscreen
                            if (document.documentElement.requestFullscreen) {
                                document.documentElement.requestFullscreen();
                            }
                        } else {
                            // Exit fullscreen
                            if (document.exitFullscreen) {
                                document.exitFullscreen();
                            }
                        }
                    });

                    // Optional: Update icon based on fullscreen state
                    document.addEventListener('fullscreenchange', function() {
                        const icon = fullscreenToggle.querySelector('i');
                        if (document.fullscreenElement) {
                            icon.classList.remove('fa-expand-arrows-alt');
                            icon.classList.add('fa-compress-arrows-alt');
                        } else {
                            icon.classList.remove('fa-compress-arrows-alt');
                            icon.classList.add('fa-expand-arrows-alt');
                        }
                    });
                });
                </script>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                        <i class="fas fa-th-large"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- Control Sidebar Toggle -->
                        <a href="#" class="dropdown-item" data-widget="control-sidebar"
                            data-controlsidebar-slide="true">
                            <i class="fas fa-th-large mr-2"></i> Toggle Sidebar
                        </a>
                        <div class="dropdown-divider"></div>
                        <!-- Logout Button -->
                        {{-- <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a> --}}
                        <!-- Hidden Logout Form -->
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                    <style>
                        .nav-item .dropdown-menu {
                            min-width: 150px;
                            padding: 0.25rem 0;
                        }

                        .dropdown-item {
                            padding: 0.5rem 1rem;
                            display: flex;
                            align-items: center;
                            transition: background-color 0.2s ease;
                        }

                        .dropdown-item:hover {
                            background-color: #f8f9fa;
                        }

                        .dropdown-item i {
                            width: 20px;
                            text-align: center;
                        }

                        .dropdown-divider {
                            margin: 0.25rem 0;
                        }
                    </style>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-5">

            <a href="{{ route('manageAdmins')}}" class="brand-link">
                <img style="margin-left: 0" src="{{asset('admincss/dist/img/royal2.webp')}}" alt="Gym Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><b style="font-family: candara;">Royal Power Gym
                    </b></span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        {{-- <img src="dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image"> --}}
                        <img src="{{ asset('uploads/avatars/' . Auth::user()->avatar) }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>

                    <div class="info">
                        <a href="{{route('view.profile')}}" class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('adminDash') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    <B>Dashboard</B>
                                    <span class="right badge badge-danger">Admin</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Dynamic Contents <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Change Contents</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-desktop"></i>
                                <p>
                                    Frontend Pages <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('frontend.home') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Home</p>
                                    </a>
                                </li>

                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('frontend.whyus') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Whyus</p>
                                    </a>
                                </li>

                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('frontend.trainers') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Trainers</p>
                                    </a>
                                </li>

                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('frontend.contact') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact Us</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Customers Contacts<i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.contacts.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Contacts</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Client<i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('client.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Client</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Events
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('calendar.show') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Events</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-id-card"></i>
                                <p>
                                    Gym's Employees
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('employee.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Employees</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Memberships
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('membership.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Memberships</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-check-circle"></i>
                                <p>
                                    Attendances
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('manageAttendance.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Attendance</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-map-marker-alt"></i>
                                <p>
                                    Geolocation Attendance
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('attendance.summary')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View GeoAttendance</p>
                                    </a>
                                </li>
                            </ul>

                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-map"></i>
                                <p>
                                    Attendance Coordinates
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('attendance.coordinate')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Coordinates List</p>
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-bullhorn"></i>

                                <p>
                                    Announcements
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('view.announcements') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Announcements</p>
                                    </a>

                                </li>
                            </ul>


                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>

                                <p>
                                    Settings & Customization
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('view.profile') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setting</p>
                                    </a>

                                </li>
                            </ul>

                        </li>



                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>

                                <p>
                                    Logout <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.logout') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Logout</p>
                                    </a>

                                </li>
                            </ul>


                        </li>


                    </ul>
                </nav>

            </div>

        </aside>

        @yield('content')

        <footer class="main-footer">
            <strong>Copyright &copy; 2025 <a href="/">Royal Power Gym,Nepal.</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>


    <script src=plugins/jquery/jquery.min.js></script>

    <script src=plugins/jquery-ui/jquery-ui.min.js></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src={{asset('admincss/plugins/bootstrap/js/bootstrap.bundle.min.js')}}></script>

    <script src={{asset('admincss/plugins/chart.js/Chart.min.js')}}></script>

    <script src={{asset('admincss/plugins/sparklines/sparkline.js')}}></script>

    <script src={{asset('admincss/plugins/jqvmap/jquery.vmap.min.js')}}></script>
    <script src={{asset('admincss/plugins/jqvmap/maps/jquery.vmap.usa.js')}}></script>

    <script src={{asset('admincss/plugins/jquery-knob/jquery.knob.min.js')}}></script>

    <script src={{asset('admincss/plugins/moment/moment.min.js')}}></script>
    <script src={{asset('admincss/plugins/daterangepicker/daterangepicker.js')}}></script>

    <script src={{asset('admincss/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}></script>

    <script src={{asset('admincss/plugins/summernote/summernote-bs4.min.js')}}></script>

    <script src={{asset('admincss/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}></script>

    <script src="dist/js/adminlte2167.js?v=3.2.0"></script>

    <script src="dist/js/demo.js"></script>

    <script src="dist/js/pages/dashboard.js"></script>
    @yield('customJs')
</body>


</html>