@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Class Schedule Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Class Schedule Management</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Class Schedule</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Class Name</th>
                                                <th>Instructor</th>
                                                <th>Day</th>
                                                <th>Time</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Yoga</td>
                                                <td>Jane Smith</td>
                                                <td>Monday</td>
                                                <td>10:00 AM</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>CrossFit</td>
                                                <td>Mike Johnson</td>
                                                <td>Wednesday</td>
                                                <td>6:00 PM</td>
                                                <td>
                                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>

                                                </td>
                                            </tr>
                                            <!-- Additional rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                                <a href="#" class="btn btn-success mt-3">Add New Class</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
