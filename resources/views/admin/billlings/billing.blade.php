@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Billing & Finance</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Billing & Finance</li>
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
                                <h5 class="card-title">Billing Overview</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Invoice ID</th>
                                                <th>Member Name</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#INV-001</td>
                                                <td>John Doe</td>
                                                <td>2024-08-29</td>
                                                <td>$150.00</td>
                                                <td><span class="badge badge-success">Paid</span></td>
                                                <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>#INV-002</td>
                                                <td>Jane Smith</td>
                                                <td>2024-08-30</td>
                                                <td>$100.00</td>
                                                <td><span class="badge badge-warning">Pending</span></td>
                                                <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                            </tr>
                                            <!-- Additional rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                                <a href="#" class="btn btn-success mt-3">Generate New Invoice</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
