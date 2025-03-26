@php
$layout = match (Auth::user()->role) {
'Admin' => 'admin.layouts.adminLayout',
'Trainer' => 'admin.layouts.trainerLayout',
'Staff' => 'admin.layouts.staffLayout',
'Member' => 'admin.layouts.memberLayout',
default => 'layouts.memberLayout', // Optional fallback layout
};
@endphp

@extends($layout)


@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Clients</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="navbar p-3 ">
                            <h2 class="ml-2">Clients</h2>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#addClientModal">Add New Client</button>
                        </div>

                        <div class="card-body">
                            <div>
                                @if (session('success'))
                                <div class="alert alert-success text-white bg-success alert-dismissible custom-alert fade-in"
                                    role="alert">
                                    <strong>Success!</strong> {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

                                @if (session('error'))
                                <div class="alert alert-danger text-white bg-danger alert-dismissible custom-alert fade-in"
                                    role="alert">
                                    <strong>Success!</strong> {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                            </div>

                            <!-- Add Client Modal -->
                            <div class="modal fade" id="addClientModal" tabindex="-1" role="dialog"
                                aria-labelledby="addClientModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h4 class="modal-title" id="addClientModalLabel">Add New Client</h4>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>


                                        {{-- <div class="modal-body">
                                            <form action="{{ url('AddNewClient') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name" class="font-weight-bold">Name:</label>
                                                    <input type="text" id="name" name="name"
                                                        placeholder="Enter Client Name" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="mobile" class="font-weight-bold">Phone No:</label>
                                                    <input type="tel" id="mobile" name="mobile"
                                                        placeholder="Enter Phone Number" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email" class="font-weight-bold">Email Address:</label>
                                                    <input type="email" id="email" name="email"
                                                        placeholder="Enter Email Address" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="plantype" class="font-weight-bold">Plan Type:</label>
                                                    <select id="plantype" name="plantype" class="form-control" required>
                                                        <option value="" disabled selected>Select Plan Type</option>
                                                        <option value="1 month">1 month</option>
                                                        <option value="3 months">3 months</option>
                                                        <option value="6 months">6 months</option>
                                                        <option value="1 year">1 year</option>

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="planEndDate" class="font-weight-bold">Plan End
                                                        Date:</label>
                                                    <input type="date" id="planEndDate" name="planEndDate"
                                                        class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="trainerStatus" class="font-weight-bold">Trainer
                                                        Status:</label>
                                                    <select id="trainerStatus" name="trainerStatus" class="form-control"
                                                        required>
                                                        <option value="" disabled selected>Select Trainer Status
                                                        </option>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="dueAmount" class="font-weight-bold">Due Amount:</label>
                                                    <input type="number" id="dueAmount" name="dueAmount"
                                                        placeholder="Enter Due Amount" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="image" class="font-weight-bold">Image:</label>
                                                    <input type="file" id="image" name="image" class="form-control">
                                                </div>

                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-save"></i> Save
                                                    </button>
                                                </div>
                                            </form>
                                        </div> --}}

                                        <div class="modal-body">
                                            <form action="{{ url('AddNewClient') }}" method="POST"
                                                enctype="multipart/form-data" class="needs-validation" novalidate>
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-4">
                                                            <label for="name" class="form-label font-weight-bold">Name
                                                                <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-user"></i></span>
                                                                </div>
                                                                <input type="text" id="name" name="name"
                                                                    placeholder="Enter Client Name" class="form-control"
                                                                    required>
                                                                <div class="invalid-feedback">Please enter client name.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <label for="mobile"
                                                                class="form-label font-weight-bold">Phone No <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-phone"></i></span>
                                                                </div>
                                                                <input type="tel" id="mobile" name="mobile"
                                                                    placeholder="Enter Phone Number"
                                                                    class="form-control" required>
                                                                <div class="invalid-feedback">Please enter phone number.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <label for="email" class="form-label font-weight-bold">Email
                                                                Address</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-envelope"></i></span>
                                                                </div>
                                                                <input type="email" id="email" name="email"
                                                                    placeholder="Enter Email Address"
                                                                    class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <label for="plantype"
                                                                class="form-label font-weight-bold">Plan Type <span
                                                                    class="text-danger">*</span></label>
                                                            <select id="plantype" name="plantype"
                                                                class="form-control custom-select" required>
                                                                <option value="" disabled selected>Select Plan Type
                                                                </option>
                                                                <option value="1 month">1 Month</option>
                                                                <option value="3 months">3 Months</option>
                                                                <option value="6 months">6 Months</option>
                                                                <option value="1 year">1 Year</option>
                                                            </select>
                                                            <div class="invalid-feedback">Please select a plan type.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mb-4">
                                                            <label for="planEndDate"
                                                                class="form-label font-weight-bold">Plan End Date <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-calendar-alt"></i></span>
                                                                </div>
                                                                <input type="date" id="planEndDate" name="planEndDate"
                                                                    class="form-control" required>
                                                                <div class="invalid-feedback">Please select plan end
                                                                    date.</div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <label for="trainerStatus"
                                                                class="form-label font-weight-bold">Trainer Status <span
                                                                    class="text-danger">*</span></label>
                                                            <select id="trainerStatus" name="trainerStatus"
                                                                class="form-control custom-select" required>
                                                                <option value="" disabled selected>Select Trainer Status
                                                                </option>
                                                                <option value="Active">Active</option>
                                                                <option value="Inactive">Inactive</option>
                                                            </select>
                                                            <div class="invalid-feedback">Please select trainer status.
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <label for="dueAmount"
                                                                class="form-label font-weight-bold">Due Amount <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-rupee-sign"></i></span>
                                                                </div>
                                                                <input type="number" id="dueAmount" name="dueAmount"
                                                                    placeholder="Enter Due Amount" class="form-control"
                                                                    required min="0" step="0.01">
                                                                <div class="invalid-feedback">Please enter a valid
                                                                    amount.</div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <label for="image"
                                                                class="form-label font-weight-bold">Image</label>
                                                            <input type="file" id="image" name="image"
                                                                class="form-control-file" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-right mt-3">
                                                    <button type="submit" class="btn btn-success btn-lg">
                                                        <i class="fas fa-save mr-2"></i> Save Client
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                        <style>
                                            .form-group label {
                                                color: #333;
                                                margin-bottom: 0.5rem;
                                            }

                                            .form-control,
                                            .custom-select {
                                                border-radius: 6px;
                                                padding: 0.5rem 1rem;
                                                transition: all 0.2s ease;
                                            }

                                            .form-control:focus,
                                            .custom-select:focus {
                                                border-color: #007bff;
                                                box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
                                            }

                                            .input-group-text {
                                                background-color: #f8f9fa;
                                                border-right: none;
                                                border-radius: 6px 0 0 6px;
                                            }

                                            .input-group .form-control {
                                                border-left: none;
                                                border-radius: 0 6px 6px 0;
                                            }

                                            .btn-success {
                                                padding: 0.6rem 1.5rem;
                                                border-radius: 6px;
                                                transition: all 0.2s ease;
                                            }

                                            .btn-success:hover {
                                                background-color: #218838;
                                                transform: translateY(-1px);
                                            }

                                            .invalid-feedback {
                                                font-size: 0.9em;
                                            }
                                        </style>

                                        <script>
                                            // Bootstrap form validation
                                            (function() {
                                                'use strict';
                                                window.addEventListener('load', function() {
                                                    var forms = document.getElementsByClassName('needs-validation');
                                                    Array.prototype.filter.call(forms, function(form) {
                                                        form.addEventListener('submit', function(event) {
                                                            if (form.checkValidity() === false) {
                                                                event.preventDefault();
                                                                event.stopPropagation();
                                                            }
                                                            form.classList.add('was-validated');
                                                        }, false);
                                                    });
                                                }, false);
                                            })();
                                        </script>
                                    </div>
                                </div>
                            </div>


                            {{-- <table id="ClientTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Plan Type</th>
                                        <th>Plan End Date</th>
                                        <th>Status</th>
                                        <th>Due Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $item)
                                    <tr>
                                        <td>
                                            <img style="border-radius: 50px" src="/storage/{{ $item->image }}"
                                                width="100px" alt="Client Photo">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->mobile }}</td>
                                        <td>{{ $item->email}}</td>
                                        <td>{{ $item->plantype }}</td>
                                        <td>{{ $item->planEndDate }}</td>
                                        <td>{{ $item->trainerStatus }}</td>
                                        <td>{{ $item->dueAmount }}</td>
                                        <td class="font-weight-medium">
                                            <button type="button" class="btn" title="Edit" data-toggle="modal"
                                                data-target="#updateModel{{ $item->id }}">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </button>



                                            <!-- View Button -->
                                            <button type="button" class="btn" title="View" data-toggle="modal"
                                                data-target="#viewModel{{ $item->id }}">
                                                <i class="fas fa-eye fa-lg"></i>
                                            </button>

                                            <!-- View Modal -->
                                            <div class="modal fade" id="viewModel{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="viewModelLabel{{ $item->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h5 class="modal-title" id="viewModelLabel{{ $item->id }}">
                                                                Client Details</h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Enhanced Client Details Card -->
                                                            <div class="card">
                                                                <div class="card-header bg-dark text-white">
                                                                    <h5 class="card-title mb-0">Client's Information
                                                                    </h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <!-- Client's Image -->
                                                                        <div class="col-md-4 text-center">
                                                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                                                alt="{{ $item->name }}"
                                                                                class="img-fluid rounded shadow"
                                                                                style="max-height: 250px; width: auto;">
                                                                        </div>
                                                                        <!-- Client's Details -->
                                                                        <div class="col-md-8">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Name:</strong></h6>
                                                                                    <p>{{ $item->name }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Phone Number:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->mobile }}</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Email Address:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->email }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Plan Type:</strong></h6>
                                                                                    <p>{{ $item->plantype }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Plan End Date:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->planEndDate }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Status:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->trainerStatus}}
                                                                                    </p>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Due Amount</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->dueAmount }}
                                                                                    </p>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal" id="updateModel{{ $item->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header btn-primary">
                                                            <h4 class="modal-title"><b>Update Client</b></h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('UpdateClient') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')


                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Client's
                                                                        Name:</label>
                                                                    <input type="text" id="name" name="name"
                                                                        value="{{$item->name}}"
                                                                        placeholder="Enter Client's Name:"
                                                                        class="form-control mb-2">

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="mobile">Phone No:</label>
                                                                    <input type="tel" id="mobile" name="mobile"
                                                                        value="{{ $item->mobile }}"
                                                                        class="form-control mb-2">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="email" class="font-weight-bold">Email
                                                                        Address:</label>
                                                                    <input type="email" id="email" name="email"
                                                                        value="{{$item->email}}"
                                                                        placeholder="Enter Email Address"
                                                                        class="form-control">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="plantype" class="font-weight-bold">Plan
                                                                        Type:</label>
                                                                    <select id="plantype" name="plantype"
                                                                        class="form-control" required>
                                                                        <option disabled>Select Plan Type</option>
                                                                        <option value="1 month" {{ $item->plantype ==
                                                                            '1 month' ? 'selected' : '' }}>1 month
                                                                        </option>
                                                                        <option value=" 3 months" {{ $item->plantype ==
                                                                            '3 months' ? 'selected' : '' }}>3 months
                                                                        </option>
                                                                        <option value="6 months" {{ $item->plantype ==
                                                                            '6 months' ? 'selected' : '' }}>6 months
                                                                        </option>
                                                                        <option value="1 year" {{ $item->plantype ==
                                                                            '1 year' ? 'selected' : '' }}>1 year
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="planEndDate"
                                                                        class="font-weight-bold">Plan End
                                                                        Date:</label>
                                                                    <input type="date" id="planEndDate"
                                                                        name="planEndDate"
                                                                        value="{{$item->planEndDate}}"
                                                                        class="form-control" required>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="trainerStatus"
                                                                        class="font-weight-bold">Trainer Status:</label>
                                                                    <select id="trainerStatus" name="trainerStatus"
                                                                        class="form-control" required>
                                                                        <option disabled>Select Trainer Status</option>
                                                                        <option value="Active" {{ $item->trainerStatus
                                                                            == 'Active' ? 'selected' : '' }}>Active
                                                                        </option>
                                                                        <option value="Inactive" {{ $item->trainerStatus
                                                                            == 'Inactive' ? 'selected' : '' }}>Inactive
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="dueAmount" class="font-weight-bold">Due
                                                                        Amount:</label>
                                                                    <input type="number" id="dueAmount"
                                                                        value="{{$item->dueAmount}}" name="dueAmount"
                                                                        placeholder="Enter Due Amount"
                                                                        class="form-control" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image"
                                                                        class="font-weight-bold">Image:</label>
                                                                    <input type="file" id="image"
                                                                        value="{{$item->image}}" name="image"
                                                                        class="form-control">
                                                                </div>

                                                                <input type="hidden" name="id" value="{{ $item->id }}">

                                                                <div class="d-grid">
                                                                    <button type="submit" name="save"
                                                                        class="btn btn-success" value="Save Changes"><i
                                                                            class="fas fa-save"></i>
                                                                        Save Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <form action="{{route('client.destroy',$item->id)}}" method="POST"
                                                style="display:inline-block;"> @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm w-10" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                                    <i class="fas fa-lg fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table> --}}

                            <div class="card shadow-sm">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title mb-0">Client List</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table">
                                        <table id="ClientTable"
                                            class="table table-bordered table-striped table-hover mb-0">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th class="py-2 px-2">Photo</th>
                                                    <th class="py-2 px-2">Name</th>
                                                    <th class="py-2 px-2">Phone</th>
                                                    <th class="py-2 px-2">Email</th>
                                                    <th class="py-2 px-2">Plan Type</th>
                                                    <th class="py-2 px-2">Plan End Date</th>
                                                    <th class="py-2 px-2">Status</th>
                                                    <th class="py-2 px-2">Due Amount</th>
                                                    <th class="py-2 px-2">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($clients as $item)
                                                <tr>
                                                    <td class="py-3 px-4 align-middle">
                                                        <img src="{{ asset('storage/' . $item->image) }}"
                                                            class="rounded-circle shadow-sm" width="50" height="50"
                                                            alt="{{ $item->name }}"
                                                            onerror="this.src='/default-avatar.png'">
                                                    </td>
                                                    <td class="py-3 px-2 align-middle">{{ $item->name }}</td>
                                                    <td class="py-3 px-2 align-middle">{{ $item->mobile }}</td>
                                                    <td class="py-3 px-2 align-middle">
                                                        {{-- <a href="mailto:{{ $item->email }}"
                                                            class="text-decoration-none">{{ $item->email }}</a> --}}
                                                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $item->email }}"
                                                            class="text-decoration-none" target="_blank">
                                                            {{ $item->email }}
                                                        </a>
                                                    </td>
                                                    <td class="py-3 px-2 align-middle">{{ $item->plantype }}</td>
                                                    <td class="py-3 px-2 align-middle">{{ $item->planEndDate }}</td>
                                                    <td class="py-3 px-2 align-middle">
                                                        <span
                                                            class="badge {{ $item->trainerStatus == 'Active' ? 'badge-success' : 'badge-danger' }}">
                                                            {{ $item->trainerStatus }}
                                                        </span>
                                                    </td>
                                                    <td class="py-3 px-2 align-middle">₹{{
                                                        number_format($item->dueAmount, 2) }}</td>
                                                    <td class="py-3 px-2 align-middle">
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-sm btn-primary"
                                                                title="Edit" data-toggle="modal"
                                                                data-target="#updateModel{{ $item->id }}">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-info"
                                                                title="View" data-toggle="modal"
                                                                data-target="#viewModel{{ $item->id }}">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                            {{-- <form action="{{ route('client.destroy', $item->id) }}"
                                                                method="POST" class="d-inline-block"
                                                                onsubmit="return confirm('Are you sure you want to delete this client?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    title="Delete">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form> --}}
                                                            <form action="{{ route('client.destroy', $item->id) }}"
                                                                method="POST" class="d-inline-block delete-form"
                                                                data-id="{{ $item->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button"
                                                                    class="btn btn-sm btn-danger delete-btn"
                                                                    title="Delete" data-id="{{ $item->id }}">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>

                                                            @include('admin.layouts.deleteModal')
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- View Modal -->
                                                <div class="modal fade" id="viewModel{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="viewModelLabel{{ $item->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary text-white">
                                                                <h5 class="modal-title"
                                                                    id="viewModelLabel{{ $item->id }}">
                                                                    <i class="fas fa-user mr-2"></i>Client Details
                                                                </h5>
                                                                <button type="button" class="close text-white"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card border-0 shadow-sm">
                                                                    <div class="card-body">
                                                                        <div class="row align-items-center">
                                                                            <div
                                                                                class="col-md-4 text-center mb-3 mb-md-0">
                                                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                                                    alt="{{ $item->name }}"
                                                                                    class="img-fluid rounded shadow"
                                                                                    style="max-height: 200px; width: auto;">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <dl class="row mb-0">
                                                                                    <dt class="col-sm-4">Name:</dt>
                                                                                    <dd class="col-sm-8">{{ $item->name
                                                                                        }}</dd>
                                                                                    <dt class="col-sm-4">Phone:</dt>
                                                                                    <dd class="col-sm-8">{{
                                                                                        $item->mobile }}</dd>
                                                                                    <dt class="col-sm-4">Email:</dt>
                                                                                    <dd class="col-sm-8">{{ $item->email
                                                                                        }}</dd>
                                                                                    <dt class="col-sm-4">Plan Type:</dt>
                                                                                    <dd class="col-sm-8">{{
                                                                                        $item->plantype }}</dd>
                                                                                    <dt class="col-sm-4">Plan End Date:
                                                                                    </dt>
                                                                                    <dd class="col-sm-8">{{
                                                                                        $item->planEndDate }}</dd>
                                                                                    <dt class="col-sm-4">Status:</dt>
                                                                                    <dd class="col-sm-8">
                                                                                        <span
                                                                                            class="badge {{ $item->trainerStatus == 'Active' ? 'badge-success' : 'badge-danger' }}">
                                                                                            {{ $item->trainerStatus }}
                                                                                        </span>
                                                                                    </dd>
                                                                                    <dt class="col-sm-4">Due Amount:
                                                                                    </dt>
                                                                                    <dd class="col-sm-8">₹{{
                                                                                        number_format($item->dueAmount,
                                                                                        2) }}
                                                                                    </dd>
                                                                                </dl>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-dismiss="modal">
                                                                    Close
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Update Modal -->
                                                <div class="modal fade" id="updateModel{{ $item->id }}" tabindex="-1"
                                                    role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary text-white">
                                                                <h4 class="modal-title"><i
                                                                        class="fas fa-edit mr-2"></i>Update Client</h4>
                                                                <button type="button" class="close text-white"
                                                                    data-dismiss="modal">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('UpdateClient') }}" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="name{{ $item->id }}"
                                                                                    class="font-weight-bold">Name:</label>
                                                                                <input type="text"
                                                                                    id="name{{ $item->id }}" name="name"
                                                                                    value="{{ $item->name }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="mobile{{ $item->id }}"
                                                                                    class="font-weight-bold">Phone:</label>
                                                                                <input type="tel"
                                                                                    id="mobile{{ $item->id }}"
                                                                                    name="mobile"
                                                                                    value="{{ $item->mobile }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="email{{ $item->id }}"
                                                                                    class="font-weight-bold">Email:</label>
                                                                                <input type="email"
                                                                                    id="email{{ $item->id }}"
                                                                                    name="email"
                                                                                    value="{{ $item->email }}"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="plantype{{ $item->id }}"
                                                                                    class="font-weight-bold">Plan
                                                                                    Type:</label>
                                                                                <select id="plantype{{ $item->id }}"
                                                                                    name="plantype" class="form-control"
                                                                                    required>
                                                                                    <option value="1 month" {{ $item->
                                                                                        plantype == '1 month' ?
                                                                                        'selected' : '' }}>1 month
                                                                                    </option>
                                                                                    <option value="3 months" {{ $item->
                                                                                        plantype == '3 months' ?
                                                                                        'selected' : '' }}>3 months
                                                                                    </option>
                                                                                    <option value="6 months" {{ $item->
                                                                                        plantype == '6 months' ?
                                                                                        'selected' : '' }}>6 months
                                                                                    </option>
                                                                                    <option value="1 year" {{ $item->
                                                                                        plantype == '1 year' ?
                                                                                        'selected' : '' }}>1 year
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="planEndDate{{ $item->id }}"
                                                                                    class="font-weight-bold">Plan End
                                                                                    Date:</label>
                                                                                <input type="date"
                                                                                    id="planEndDate{{ $item->id }}"
                                                                                    name="planEndDate"
                                                                                    value="{{ $item->planEndDate }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="trainerStatus{{ $item->id }}"
                                                                                    class="font-weight-bold">Status:</label>
                                                                                <select
                                                                                    id="trainerStatus{{ $item->id }}"
                                                                                    name="trainerStatus"
                                                                                    class="form-control" required>
                                                                                    <option value="Active" {{ $item->
                                                                                        trainerStatus == 'Active' ?
                                                                                        'selected' : '' }}>Active
                                                                                    </option>
                                                                                    <option value="Inactive" {{ $item->
                                                                                        trainerStatus == 'Inactive' ?
                                                                                        'selected' : '' }}>Inactive
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="dueAmount{{ $item->id }}"
                                                                                    class="font-weight-bold">Due
                                                                                    Amount:</label>
                                                                                <input type="number"
                                                                                    id="dueAmount{{ $item->id }}"
                                                                                    name="dueAmount"
                                                                                    value="{{ $item->dueAmount }}"
                                                                                    class="form-control" required
                                                                                    step="0.01">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="image{{ $item->id }}"
                                                                                    class="font-weight-bold">Image:</label>
                                                                                <input type="file"
                                                                                    id="image{{ $item->id }}"
                                                                                    name="image"
                                                                                    class="form-control-file">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $item->id }}">
                                                                    <button type="submit"
                                                                        class="btn btn-success float-right">
                                                                        <i class="fas fa-save mr-2"></i>Save Changes
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <style>
                                .table th {
                                    font-weight: 600;
                                    border-bottom: 2px solid #dee2e6;
                                }

                                .table td {
                                    vertical-align: middle;
                                }

                                .table-hover tbody tr:hover {
                                    background-color: #f8f9fa;
                                    transition: background-color 0.2s;
                                }

                                .card {
                                    border: none;
                                    border-radius: 8px;
                                    overflow: hidden;
                                }

                                .btn-group .btn {
                                    margin: 0 2px;
                                    padding: 6px 12px;
                                    border-radius: 4px;
                                    transition: all 0.2s;
                                }

                                .btn-group .btn:hover {
                                    transform: translateY(-1px);
                                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                }

                                .modal-content {
                                    border-radius: 8px;
                                }

                                .form-control,
                                .form-control-file {
                                    border-radius: 6px;
                                }

                                .badge {
                                    padding: 0.5em 0.8em;
                                    font-size: 0.9em;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</div>
@endsection

@section('customJs')
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function() {
        $("#ClientTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#ClientTable_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection