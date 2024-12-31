@extends('admin.layouts.adminLayout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Welcome, <b>{{Auth::user()->name}}</b>!</h1>
                    <h3>Dashboard/ <b>{{Auth::user()->role}}</b></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>{{Auth::user()->role}} Dashboard</b></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Quick Stats -->
            <div class="row">
                <!-- Assigned Members -->
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>120</h3>
                            <p>Assigned Members</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="{{ route('client.create') }}" class="small-box-footer">View Members <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Attendance -->
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>85%</h3>
                            <p>Attendance Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark"></i>
                        </div>
                        <a href="{{route('attendance.summary')}}" class="small-box-footer">View Attendance <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Tasks Completed -->
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>30</h3>
                            <p>Tasks Completed</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                        <a href="#" class="small-box-footer">View Tasks <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Task List -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Today's Tasks</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Update Member Profiles
                                    <span class="badge badge-primary badge-pill">Pending</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Conduct Training Session - Yoga
                                    <span class="badge badge-success badge-pill">Completed</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Clean Gym Equipment
                                    <span class="badge badge-warning badge-pill">In Progress</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendance Overview -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Attendance Overview (This Month)</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    John Doe
                                    <span class="badge badge-success badge-pill">Present</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Jane Smith
                                    <span class="badge badge-danger badge-pill">Absent</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Mike Johnson
                                    <span class="badge badge-warning badge-pill">Late</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Notifications -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Notifications</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Equipment Maintenance Scheduled
                                    <span class="badge badge-info badge-pill">New</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Monthly Staff Meeting on Oct 15
                                    <span class="badge badge-success badge-pill">Upcoming</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Updated Gym Rules
                                    <span class="badge badge-warning badge-pill">Important</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection