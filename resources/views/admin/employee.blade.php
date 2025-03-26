@php
$layout = match (Auth::user()->role) {
'Admin' => 'admin.layouts.adminLayout',
'Trainer' => 'admin.layouts.trainerLayout',
'Staff' => 'admin.layouts.staffLayout',
'Member' => 'admin.layouts.memberLayout',
default => 'layouts.memberLayout',
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
                    <h1>Gym's Employee List </h1>
                    <p>Dashboard/Employee</p>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Gym's Employee</li>
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
                            <h2 class="ml-2">Gym's Employee</h2>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#addEmployeeModal">Add New Employee</button>
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

                            <!-- Add Employee Modal -->
                            {{-- <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog"
                                aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h4 class="modal-title" id="addEmployeeModalLabel">Add New Employee</h4>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>


                                        <div class="modal-body">
                                            <form action="{{ url('AddNewEmployee') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="photo" class="font-weight-bold">Employee Photo:</label>
                                                    <input type="file" id="photo" name="photo"
                                                        placeholder=" Employee Photo" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="font-weight-bold">Name:</label>
                                                    <input type="text" id="name" name="name"
                                                        placeholder="Enter Employee Name" class="form-control" required>
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
                                                    <label for="joinDate" class="font-weight-bold">Join Date:</label>
                                                    <input type="date" id="joinDate" name="joinDate"
                                                        placeholder="Join Date" class="form-control datepicker">
                                                </div>

                                                <div class="form-group">
                                                    <label for="role" class="font-weight-bold">Role:</label>
                                                    <select id="role" name="role" class="form-control" required>
                                                        <option value="" disabled selected> Role</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Trainer">Trainer</option>
                                                        <option value="Staff">Staff</option>
                                                        <option value="Member">Member</option>

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="status" class="font-weight-bold">Employee
                                                        Status:</label>
                                                    <select id="status" name="status" class="form-control" required>
                                                        <option value="" disabled selected> Employee Status
                                                        </option>
                                                        <option value="Active"> <i class="fas fa-check-circle"></i>
                                                            Active</option>
                                                        <option value="Inactive"> <i class="fas fa-times-circle"></i>
                                                            Inactive</option>
                                                    </select>
                                                </div>

                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-save"></i> Save
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog"
                                aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h4 class="modal-title" id="addEmployeeModalLabel">
                                                <i class="fas fa-user-plus mr-2"></i>Add New Employee
                                            </h4>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('AddNewEmployee') }}" method="POST"
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
                                                                    placeholder="Enter Employee Name"
                                                                    class="form-control" required>
                                                                <div class="invalid-feedback">Please enter employee
                                                                    name.</div>
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
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mb-4">
                                                            <label for="joinDate"
                                                                class="form-label font-weight-bold">Join Date <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-calendar-alt"></i></span>
                                                                </div>
                                                                <input type="date" id="joinDate" name="joinDate"
                                                                    class="form-control" required>
                                                                <div class="invalid-feedback">Please select join date.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <label for="role" class="form-label font-weight-bold">Role
                                                                <span class="text-danger">*</span></label>
                                                            <select id="role" name="role"
                                                                class="form-control custom-select" required>
                                                                <option value="" disabled selected>Select Role</option>
                                                                <option value="Admin">Admin</option>
                                                                <option value="Trainer">Trainer</option>
                                                                <option value="Staff">Staff</option>
                                                                <option value="Member">Member</option>
                                                            </select>
                                                            <div class="invalid-feedback">Please select a role.</div>
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <label for="status"
                                                                class="form-label font-weight-bold">Status <span
                                                                    class="text-danger">*</span></label>
                                                            <select id="status" name="status"
                                                                class="form-control custom-select" required>
                                                                <option value="" disabled selected>Select Status
                                                                </option>
                                                                <option value="Active">Active</option>
                                                                <option value="Inactive">Inactive</option>
                                                            </select>
                                                            <div class="invalid-feedback">Please select status.</div>
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <label for="photo" class="form-label font-weight-bold">Photo
                                                                <span class="text-danger">*</span></label>
                                                            <input type="file" id="photo" name="photo"
                                                                class="form-control-file" accept="image/*" required>
                                                            <div class="invalid-feedback">Please upload a photo.</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-right mt-3">
                                                    <button type="submit" class="btn btn-success btn-lg">
                                                        <i class="fas fa-save mr-2"></i> Save Employee
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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

                                .modal-content {
                                    border-radius: 8px;
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


                            {{-- <table id="EmployeeTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Join Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $item)
                                    <tr>
                                        <td>
                                            <img class="img-fluid rounded-circle" src="/storage/{{ $item->photo }}"
                                                width="40px" alt="Employee Photo">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->mobile }}</td>
                                        <td>{{ $item->email}}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>{{ $item->joinDate }}</td>
                                        <td>{{ $item->status }}</td>
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
                                                                Employee Details</h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Enhanced Employee Details Card -->
                                                            <div class="card">
                                                                <div class="card-header bg-dark text-white">
                                                                    <h5 class="card-title mb-0">Employee's Information
                                                                    </h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <!-- Employee's Image -->
                                                                        <div class="col-md-4 text-center">
                                                                            <img src="{{ asset('storage/' . $item->photo) }}"
                                                                                alt="{{ $item->name }}"
                                                                                class="img-fluid rounded shadow"
                                                                                style="max-height: 250px; width: auto;">
                                                                        </div>
                                                                        <!-- Employee's Details -->
                                                                        <div class="col-md-8">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Name:</strong></h6>
                                                                                    <p>{{ $item->name }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Mobile Number:</strong>
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
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Role:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->role }}
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Join Date:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->joinDate }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Status:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->status}}
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

                                            <div class="modal fade" id="updateModel{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="updateModelLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h5 class="modal-title" id="updateModelLabel"><i
                                                                    class="fas fa-edit"></i> Update Employee</h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('UpdateEmployee') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')


                                                                <div class="form-row">
                                                                    <div class="col-md-12 text-center mb-3">
                                                                        @if($item->photo)
                                                                        <img src="{{ asset('storage/'.$item->photo) }}"
                                                                            alt="Current Photo" class="img-thumbnail"
                                                                            style="max-width: 150px; max-height: 150px;">
                                                                        @else
                                                                        <p class="text-muted">No photo available</p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label for="photo"
                                                                            class="font-weight-bold">Upload New
                                                                            Photo:</label>
                                                                        <input type="file" id="photo" name="photo"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="name" class="form-label">Employee's
                                                                            Name:</label>
                                                                        <input type="text" id="name" name="name"
                                                                            value="{{$item->name}}"
                                                                            placeholder="Enter Employee's Name:"
                                                                            class="form-control mb-2">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="mobile">Mobile No:</label>
                                                                        <input type="tel" id="mobile" name="mobile"
                                                                            value="{{ $item->mobile }}"
                                                                            class="form-control mb-2">
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="email"
                                                                            class="font-weight-bold">Email
                                                                            Address:</label>
                                                                        <input type="email" id="email" name="email"
                                                                            value="{{$item->email}}"
                                                                            placeholder="Enter Email Address"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="status" class="font-weight-bold">
                                                                            Status:</label>
                                                                        <select id="status" name="status"
                                                                            class="form-control" required>
                                                                            <option disabled> Employee Status</option>
                                                                            <option value="Active" {{ $item->status
                                                                                == 'Active' ? 'selected' : '' }}>Active
                                                                            </option>
                                                                            <option value="Inactive" {{ $item->status
                                                                                == 'Inactive' ? 'selected' : ''
                                                                                }}>Inactive
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="role" class="font-weight-bold">
                                                                            Role:</label>
                                                                        <select id="role" name="role"
                                                                            class="form-control" required>
                                                                            <option disabled> Employee Role</option>
                                                                            <option value="Active" {{ $item->role
                                                                                == 'Admin' ? 'selected' : ''
                                                                                }}>
                                                                                Admin
                                                                            </option>
                                                                            <option value="Staff" {{ $item->role
                                                                                == 'Staff' ? 'selected' : '' }}>Staff
                                                                            </option>
                                                                            <option value="Member" {{ $item->role
                                                                                == 'Member' ? 'selected' : '' }}>Member
                                                                            </option>
                                                                            <option value="Trainer" {{ $item->role
                                                                                == 'Trainer' ? 'selected' : ''
                                                                                }}>Trainer
                                                                            </option>
                                                                        </select>
                                                                    </div>


                                                                    <div class="form-group col-md-6">
                                                                        <label for="joinDate"
                                                                            class="font-weight-bold">Join
                                                                            Date:</label>
                                                                        <input type="date" id="joinDate" name="joinDate"
                                                                            value="{{$item->joinDate}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>



                                                                <input type="hidden" name="id" value="{{ $item->id }}">

                                                                <!-- Submit Button -->
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success">
                                                                        <i class="fas fa-save"></i> Save Changes
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <form action="{{route('employee.destroy',$item->id)}}" method="POST"
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
                                    <h3 class="card-title mb-0">Employee List</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table id="EmployeeTable"
                                            class="table table-bordered table-striped table-hover mb-0">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th class="py-3 px-4">Photo</th>
                                                    <th class="py-3 px-4">Name</th>
                                                    <th class="py-3 px-4">Mobile</th>
                                                    <th class="py-3 px-4">Email</th>
                                                    <th class="py-3 px-4">Role</th>
                                                    <th class="py-3 px-4">Join Date</th>
                                                    <th class="py-3 px-4">Status</th>
                                                    <th class="py-3 px-4">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employees as $item)
                                                <tr>
                                                    <td class="py-3 px-4 align-middle">
                                                        <img src="{{ asset('storage/' . $item->photo) }}"
                                                            class="rounded-circle shadow-sm" width="50" height="50"
                                                            alt="{{ $item->name }}"
                                                            onerror="this.src='/default-avatar.png'">
                                                    </td>
                                                    <td class="py-3 px-4 align-middle">{{ $item->name }}</td>
                                                    <td class="py-3 px-4 align-middle">{{ $item->mobile }}</td>
                                                    <td class="py-3 px-4 align-middle">
                                                        {{-- <a href="mailto:{{ $item->email }}"
                                                            class="text-decoration-none">{{ $item->email }}</a> --}}
                                                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $item->email }}"
                                                            class="text-decoration-none" target="_blank">
                                                            {{ $item->email }}
                                                        </a>
                                                    </td>
                                                    <td class="py-3 px-4 align-middle">{{ $item->role }}</td>
                                                    <td class="py-3 px-4 align-middle">{{ $item->joinDate }}</td>
                                                    <td class="py-3 px-4 align-middle">
                                                        <span
                                                            class="badge {{ $item->status == 'Active' ? 'badge-success' : 'badge-danger' }}">
                                                            {{ $item->status }}
                                                        </span>
                                                    </td>
                                                    <td class="py-3 px-4 align-middle">
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
                                                            {{-- <form
                                                                action="{{ route('employee.destroy', $item->id) }}"
                                                                method="POST" class="d-inline-block"
                                                                onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    title="Delete">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form> --}}

                                                            <!-- Delete Form -->
                                                            <form action="{{ route('employee.destroy', $item->id) }}"
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
                                                                    <i class="fas fa-user mr-2"></i>Employee Details
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
                                                                                <img src="{{ asset('storage/' . $item->photo) }}"
                                                                                    alt="{{ $item->name }}"
                                                                                    class="img-fluid rounded shadow"
                                                                                    style="max-height: 200px; width: auto;">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <dl class="row mb-0">
                                                                                    <dt class="col-sm-4">Name:</dt>
                                                                                    <dd class="col-sm-8">{{ $item->name
                                                                                        }}</dd>
                                                                                    <dt class="col-sm-4">Mobile:</dt>
                                                                                    <dd class="col-sm-8">{{
                                                                                        $item->mobile }}</dd>
                                                                                    <dt class="col-sm-4">Email:</dt>
                                                                                    <dd class="col-sm-8">{{ $item->email
                                                                                        }}</dd>
                                                                                    <dt class="col-sm-4">Role:</dt>
                                                                                    <dd class="col-sm-8">{{ $item->role
                                                                                        }}</dd>
                                                                                    <dt class="col-sm-4">Join Date:</dt>
                                                                                    <dd class="col-sm-8">{{
                                                                                        $item->joinDate }}</dd>
                                                                                    <dt class="col-sm-4">Status:</dt>
                                                                                    <dd class="col-sm-8">
                                                                                        <span
                                                                                            class="badge {{ $item->status == 'Active' ? 'badge-success' : 'badge-danger' }}">
                                                                                            {{ $item->status }}
                                                                                        </span>
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
                                                                        class="fas fa-edit mr-2"></i>Update Employee
                                                                </h4>
                                                                <button type="button" class="close text-white"
                                                                    data-dismiss="modal">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('UpdateEmployee') }}" method="POST"
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
                                                                                    class="font-weight-bold">Mobile:</label>
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
                                                                                <label for="role{{ $item->id }}"
                                                                                    class="font-weight-bold">Role:</label>
                                                                                <select id="role{{ $item->id }}"
                                                                                    name="role" class="form-control"
                                                                                    required>
                                                                                    <option value="Admin" {{ $item->role
                                                                                        == 'Admin' ? 'selected' :
                                                                                        '' }}>Admin</option>
                                                                                    <option value="Staff" {{ $item->role
                                                                                        == 'Staff' ? 'selected' :
                                                                                        '' }}>Staff</option>
                                                                                    <option value="Member" {{ $item->
                                                                                        role == 'Member' ? 'selected' :
                                                                                        '' }}>Member</option>
                                                                                    <option value="Trainer" {{ $item->
                                                                                        role == 'Trainer' ? 'selected'
                                                                                        : '' }}>Trainer</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="joinDate{{ $item->id }}"
                                                                                    class="font-weight-bold">Join
                                                                                    Date:</label>
                                                                                <input type="date"
                                                                                    id="joinDate{{ $item->id }}"
                                                                                    name="joinDate"
                                                                                    value="{{ $item->joinDate }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="status{{ $item->id }}"
                                                                                    class="font-weight-bold">Status:</label>
                                                                                <select id="status{{ $item->id }}"
                                                                                    name="status" class="form-control"
                                                                                    required>
                                                                                    <option value="Active" {{ $item->
                                                                                        status == 'Active' ? 'selected'
                                                                                        : '' }}>Active</option>
                                                                                    <option value="Inactive" {{ $item->
                                                                                        status == 'Inactive' ?
                                                                                        'selected' : '' }}>Inactive
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="photo{{ $item->id }}"
                                                                                    class="font-weight-bold">Photo:</label>
                                                                                <input type="file"
                                                                                    id="photo{{ $item->id }}"
                                                                                    name="photo"
                                                                                    class="form-control-file">
                                                                                @if($item->photo)
                                                                                <div class="mt-2">
                                                                                    <img src="{{ asset('storage/'.$item->photo) }}"
                                                                                        alt="Current Photo"
                                                                                        class="img-thumbnail"
                                                                                        style="max-width: 100px; max-height: 100px;">
                                                                                </div>
                                                                                @endif
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
        $("#EmployeeTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#EmployeeTable_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection