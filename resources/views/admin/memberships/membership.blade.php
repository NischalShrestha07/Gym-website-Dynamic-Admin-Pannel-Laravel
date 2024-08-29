@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Membership Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Membership Management</li>
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
                                <h5 class="card-title">Member Directory</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Member Name</th>
                                                <th>Email</th>
                                                <th>Membership Type</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>John Doe</td>
                                                <td>john@example.com</td>
                                                <td>Annual</td>
                                                <td><span class="badge badge-success">Active</span></td>
                                                <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>Jane Smith</td>
                                                <td>jane@example.com</td>
                                                <td>Monthly</td>
                                                <td><span class="badge badge-warning">Pending</span></td>
                                                <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                            </tr>
                                            <!-- Additional rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
