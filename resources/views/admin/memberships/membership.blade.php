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
                    <h1>Memberships Lists </h1>
                    <p>Dashboard/Memberships</p>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Members</li>
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
                            <h2 class="ml-2">Members</h2>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#addMemberModal">Add New Member</button>
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

                            <div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog"
                                aria-labelledby="addMemberModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h4 class="modal-title" id="addMemberModalLabel">Add New Member</h4>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ url('AddMembership') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <!-- Member Name -->
                                                <div class="form-group">
                                                    <label for="member_name" class="font-weight-bold">Member
                                                        Name:</label>
                                                    <input type="text" id="member_name" name="member_name"
                                                        placeholder="Enter Member Name" class="form-control" required>
                                                </div>

                                                <!-- Membership Type (Dropdown) -->
                                                <div class="form-group">
                                                    <label for="membership_type" class="font-weight-bold">Membership
                                                        Type:</label>
                                                    <select id="membership_type" name="membership_type"
                                                        class="form-control" required>
                                                        <option value="" disabled selected>Select Membership Type
                                                        </option>
                                                        <option value="Basic">Basic</option>
                                                        <option value="Premium">Premium</option>
                                                        <option value="Gold">Gold</option>
                                                        <option value="Platinum">Platinum</option>
                                                    </select>
                                                </div>

                                                <!-- Phone -->
                                                <div class="form-group">
                                                    <label for="phone" class="font-weight-bold">Phone:</label>
                                                    <input type="text" id="phone" name="phone"
                                                        placeholder="Enter Phone Number" class="form-control" required>
                                                </div>

                                                <!-- Email -->
                                                <div class="form-group">
                                                    <label for="email" class="font-weight-bold">Email Address:</label>
                                                    <input type="email" id="email" name="email"
                                                        placeholder="Enter Email Address" class="form-control" required>
                                                </div>

                                                <!-- Start Date -->
                                                <div class="form-group">
                                                    <label for="start_date" class="font-weight-bold">Start Date:</label>
                                                    <input type="date" id="start_date" name="start_date"
                                                        class="form-control" required>
                                                </div>

                                                <!-- End Date -->
                                                <div class="form-group">
                                                    <label for="end_date" class="font-weight-bold">End Date:</label>
                                                    <input type="date" id="end_date" name="end_date"
                                                        class="form-control" required>
                                                </div>

                                                <!-- Address -->
                                                <div class="form-group">
                                                    <label for="address" class="font-weight-bold">Address:</label>
                                                    <textarea id="address" name="address" placeholder="Enter Address"
                                                        class="form-control"></textarea>
                                                </div>

                                                <!-- Price -->
                                                <div class="form-group">
                                                    <label for="price" class="font-weight-bold">Price:</label>
                                                    <input type="number" id="price" name="price"
                                                        placeholder="Enter Price" class="form-control" step="0.01"
                                                        required>
                                                </div>

                                                <!-- Member Photo -->
                                                <div class="form-group">
                                                    <label for="memberphoto" class="font-weight-bold">Member
                                                        Photo:</label>
                                                    <input type="file" id="memberphoto" name="memberphoto"
                                                        class="form-control-file">
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-save"></i> Save
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <table id="trainerTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Member Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Membership Type</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($memberships as $item)
                                    <tr>
                                        <td>
                                            <img style="border-radius: 50px"
                                                src="{{ asset('storage/' . $item->memberphoto) }}" width="100px"
                                                alt="Memberships Photo">
                                        </td>
                                        <td>{{ $item->member_name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{$item->email}}</td>
                                        <td> {{$item->address}}</td>
                                        <td>{{ $item->membership_type }}</td>
                                        <td>{{ $item->start_date }} </td>
                                        <td>{{ $item->end_date }}</td>
                                        <td>Rs {{$item->price}}</td>


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
                                                                Member Details</h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Enhanced Member Details Card -->
                                                            <div class="card">
                                                                <div class="card-header bg-dark text-white">
                                                                    <h5 class="card-title mb-0">Member's Information
                                                                    </h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-center">
                                                                            <img src="{{ asset('storage/' . $item->memberphoto) }}"
                                                                                alt="{{ $item->name }}"
                                                                                class="img-fluid rounded shadow"
                                                                                style="max-height: 250px; width: auto;">
                                                                        </div>
                                                                        <!-- Member's Details -->
                                                                        <div class="col-md-8">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Name:</strong></h6>
                                                                                    <p>{{ $item->member_name }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Phone Number:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->phone }}</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Address:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->address }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Membership
                                                                                            Type:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->membership_type }}</p>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Start Date:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->start_date }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>End Date:</strong>
                                                                                    </h6>
                                                                                    <p>Rs {{ $item->end_date }}</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Price:</strong></h6>
                                                                                    <p>{{ $item->price }}</p>
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

                                            <div class="modal fade" id="updateModel{{ $item->id }}">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h4 class="modal-title"><b>Update Member</b></h4>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('UpdateMembership/' . $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')

                                                                <!-- Member Name -->
                                                                <div class="form-group">
                                                                    <label for="member_name"
                                                                        class="font-weight-bold">Member Name:</label>
                                                                    <input type="text" id="member_name"
                                                                        name="member_name"
                                                                        value="{{ $item->member_name }}"
                                                                        placeholder="Enter member name"
                                                                        class="form-control" required>
                                                                </div>

                                                                <!-- Membership Type -->
                                                                <div class="form-group">
                                                                    <label for="membership_type"
                                                                        class="font-weight-bold">Membership
                                                                        Type:</label>
                                                                    <select id="membership_type" name="membership_type"
                                                                        class="form-control" required>
                                                                        <option value="" disabled>Select Membership Type
                                                                        </option>
                                                                        <option value="Basic" {{ $item->membership_type
                                                                            == 'Basic' ? 'selected' : '' }}>Basic
                                                                        </option>
                                                                        <option value="Standard" {{ $item->
                                                                            membership_type == 'Standard' ? 'selected' :
                                                                            ''
                                                                            }}>Standard</option>
                                                                        <option value="Premium" {{ $item->
                                                                            membership_type == 'Premium' ? 'selected' :
                                                                            '' }}>Premium
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <!-- Phone -->
                                                                <div class="form-group">
                                                                    <label for="phone"
                                                                        class="font-weight-bold">Phone:</label>
                                                                    <input type="tel" id="phone" name="phone"
                                                                        value="{{ $item->phone }}"
                                                                        placeholder="Enter phone number"
                                                                        class="form-control" required>
                                                                </div>

                                                                <!-- Email -->
                                                                <div class="form-group">
                                                                    <label for="email" class="font-weight-bold">Email
                                                                        Address:</label>
                                                                    <input type="email" id="email" name="email"
                                                                        value="{{ $item->email }}"
                                                                        placeholder="Enter email address"
                                                                        class="form-control" required>
                                                                </div>

                                                                <!-- Start Date -->
                                                                <div class="form-group">
                                                                    <label for="start_date"
                                                                        class="font-weight-bold">Start Date:</label>
                                                                    <input type="date" id="start_date" name="start_date"
                                                                        value="{{ $item->start_date }}"
                                                                        class="form-control" required>
                                                                </div>

                                                                <!-- End Date -->
                                                                <div class="form-group">
                                                                    <label for="end_date" class="font-weight-bold">End
                                                                        Date:</label>
                                                                    <input type="date" id="end_date" name="end_date"
                                                                        value="{{ $item->end_date }}"
                                                                        class="form-control" required>
                                                                </div>

                                                                <!-- Address -->
                                                                <div class="form-group">
                                                                    <label for="address"
                                                                        class="font-weight-bold">Address:</label>
                                                                    <textarea id="address" name="address"
                                                                        class="form-control" rows="2"
                                                                        placeholder="Enter address">{{ $item->address }}</textarea>
                                                                </div>

                                                                <!-- Price -->
                                                                <div class="form-group">
                                                                    <label for="price"
                                                                        class="font-weight-bold">Price:</label>
                                                                    <input type="number" id="price" name="price"
                                                                        value="{{ $item->price }}"
                                                                        placeholder="Enter price" class="form-control"
                                                                        step="0.01" min="0">
                                                                </div>

                                                                <!-- Member Photo -->
                                                                <div class="form-group">
                                                                    <label for="memberphoto"
                                                                        class="font-weight-bold">Member Photo:</label>
                                                                    <input type="file" id="memberphoto"
                                                                        name="memberphoto" class="form-control">
                                                                    <small class="form-text text-muted">Leave empty if
                                                                        you don't want to update the photo.</small>
                                                                </div>

                                                                <!-- Submit Button -->
                                                                <div class="text-right">
                                                                    <button type="submit" class="btn btn-success">
                                                                        <i class="fas fa-save"></i> Save Changes
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{route('membership.destroy',$item->id)}}" method="POST"
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
                                    <h3 class="card-title mb-0">Membership List</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table id="trainerTable"
                                            class="table table-bordered table-striped table-hover mb-0">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th class="py-3 px-2" style="width: 60px;">Photo</th>
                                                    <th class="py-3 px-2">Member Name</th>
                                                    <th class="py-3 px-2">Phone</th>
                                                    <th class="py-3 px-2">Email</th>
                                                    <th class="py-3 px-2">Address</th>
                                                    <th class="py-3 px-2">Membership Type</th>
                                                    <th class="py-3 px-2">Start Date</th>
                                                    <th class="py-3 px-2">End Date</th>
                                                    <th class="py-3 px-2">Price</th>
                                                    <th class="py-3 px-2" style="width: 150px; min-width: 150px;">
                                                        Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($memberships as $item)
                                                <tr>
                                                    <td class="py-2 px-2 align-middle">
                                                        <img src="{{ asset('storage/' . $item->memberphoto) }}"
                                                            class="rounded-circle shadow-sm" width="40" height="40"
                                                            alt="{{ $item->member_name }}"
                                                            onerror="this.src='/default-avatar.png'">
                                                    </td>
                                                    <td class="py-2 px-2 align-middle">{{ $item->member_name }}</td>
                                                    <td class="py-2 px-2 align-middle">{{ $item->phone }}</td>
                                                    <td class="py-2 px-2 align-middle">
                                                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $item->email }}"
                                                            class="text-decoration-none" target="_blank">
                                                            {{ $item->email }}
                                                        </a>
                                                    </td>
                                                    <td class="py-2 px-2 align-middle">{{ Str::limit($item->address, 25)
                                                        }}</td>
                                                    <td class="py-2 px-2 align-middle">{{ $item->membership_type }}</td>
                                                    <td class="py-2 px-2 align-middle">{{ $item->start_date }}</td>
                                                    <td class="py-2 px-2 align-middle">{{ $item->end_date }}</td>
                                                    <td class="py-2 px-2 align-middle">Rs {{ number_format($item->price,
                                                        2) }}</td>
                                                    <td class="py-2 px-2 align-middle">
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-primary btn-sm"
                                                                title="Edit" data-toggle="modal"
                                                                data-target="#updateModel{{ $item->id }}">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-info btn-sm"
                                                                title="View" data-toggle="modal"
                                                                data-target="#viewModel{{ $item->id }}">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                            {{-- <form
                                                                action="{{ route('membership.destroy', $item->id) }}"
                                                                method="POST" class="d-inline-block"
                                                                onsubmit="return confirm('Are you sure you want to delete this membership?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    title="Delete">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form> --}}

                                                            <!-- Delete Form -->
                                                            <form action="{{ route('membership.destroy', $item->id) }}"
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
                                                                    <i class="fas fa-user mr-2"></i>Member Details
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
                                                                                <img src="{{ asset('storage/' . $item->memberphoto) }}"
                                                                                    alt="{{ $item->member_name }}"
                                                                                    class="img-fluid rounded shadow"
                                                                                    style="max-height: 200px; width: auto;">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <dl class="row mb-0">
                                                                                    <dt class="col-sm-4">Name:</dt>
                                                                                    <dd class="col-sm-8">{{
                                                                                        $item->member_name }}</dd>
                                                                                    <dt class="col-sm-4">Phone:</dt>
                                                                                    <dd class="col-sm-8">{{ $item->phone
                                                                                        }}</dd>
                                                                                    <dt class="col-sm-4">Email:</dt>
                                                                                    <dd class="col-sm-8">{{ $item->email
                                                                                        }}</dd>
                                                                                    <dt class="col-sm-4">Address:</dt>
                                                                                    <dd class="col-sm-8">{{
                                                                                        $item->address }}</dd>
                                                                                    <dt class="col-sm-4">Membership
                                                                                        Type:</dt>
                                                                                    <dd class="col-sm-8">{{
                                                                                        $item->membership_type }}</dd>
                                                                                    <dt class="col-sm-4">Start Date:
                                                                                    </dt>
                                                                                    <dd class="col-sm-8">{{
                                                                                        $item->start_date }}</dd>
                                                                                    <dt class="col-sm-4">End Date:</dt>
                                                                                    <dd class="col-sm-8">{{
                                                                                        $item->end_date }}</dd>
                                                                                    <dt class="col-sm-4">Price:</dt>
                                                                                    <dd class="col-sm-8">Rs {{
                                                                                        number_format($item->price, 2)
                                                                                        }}
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
                                                    <div class="modal-dialog modal-lg modal-dialog-centered"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary text-white">
                                                                <h4 class="modal-title"><i
                                                                        class="fas fa-edit mr-2"></i>Update Member</h4>
                                                                <button type="button" class="close text-white"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ url('UpdateMembership/' . $item->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="member_name{{ $item->id }}"
                                                                                    class="font-weight-bold">Member
                                                                                    Name:</label>
                                                                                <input type="text"
                                                                                    id="member_name{{ $item->id }}"
                                                                                    name="member_name"
                                                                                    value="{{ $item->member_name }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="phone{{ $item->id }}"
                                                                                    class="font-weight-bold">Phone:</label>
                                                                                <input type="tel"
                                                                                    id="phone{{ $item->id }}"
                                                                                    name="phone"
                                                                                    value="{{ $item->phone }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="email{{ $item->id }}"
                                                                                    class="font-weight-bold">Email:</label>
                                                                                <input type="email"
                                                                                    id="email{{ $item->id }}"
                                                                                    name="email"
                                                                                    value="{{ $item->email }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="address{{ $item->id }}"
                                                                                    class="font-weight-bold">Address:</label>
                                                                                <textarea id="address{{ $item->id }}"
                                                                                    name="address" class="form-control"
                                                                                    rows="2">{{ $item->address }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="membership_type{{ $item->id }}"
                                                                                    class="font-weight-bold">Membership
                                                                                    Type:</label>
                                                                                <select
                                                                                    id="membership_type{{ $item->id }}"
                                                                                    name="membership_type"
                                                                                    class="form-control" required>
                                                                                    <option value="Basic" {{ $item->
                                                                                        membership_type == 'Basic' ?
                                                                                        'selected' : '' }}>Basic
                                                                                    </option>
                                                                                    <option value="Standard" {{ $item->
                                                                                        membership_type == 'Standard'
                                                                                        ? 'selected' : '' }}>Standard
                                                                                    </option>
                                                                                    <option value="Premium" {{ $item->
                                                                                        membership_type == 'Premium' ?
                                                                                        'selected' : '' }}>Premium
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="start_date{{ $item->id }}"
                                                                                    class="font-weight-bold">Start
                                                                                    Date:</label>
                                                                                <input type="date"
                                                                                    id="start_date{{ $item->id }}"
                                                                                    name="start_date"
                                                                                    value="{{ $item->start_date }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="end_date{{ $item->id }}"
                                                                                    class="font-weight-bold">End
                                                                                    Date:</label>
                                                                                <input type="date"
                                                                                    id="end_date{{ $item->id }}"
                                                                                    name="end_date"
                                                                                    value="{{ $item->end_date }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="price{{ $item->id }}"
                                                                                    class="font-weight-bold">Price:</label>
                                                                                <input type="number"
                                                                                    id="price{{ $item->id }}"
                                                                                    name="price"
                                                                                    value="{{ $item->price }}"
                                                                                    class="form-control" step="0.01"
                                                                                    min="0" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="memberphoto{{ $item->id }}"
                                                                                    class="font-weight-bold">Photo:</label>
                                                                                <input type="file"
                                                                                    id="memberphoto{{ $item->id }}"
                                                                                    name="memberphoto"
                                                                                    class="form-control-file">
                                                                                @if($item->memberphoto)
                                                                                <div class="mt-2">
                                                                                    <img src="{{ asset('storage/'.$item->memberphoto) }}"
                                                                                        alt="Current Photo"
                                                                                        class="img-thumbnail"
                                                                                        style="max-width: 100px; max-height: 100px;">
                                                                                </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                    white-space: nowrap;
                                }

                                .table td {
                                    vertical-align: middle;
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
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
                                    padding: 6px 10px;
                                    border-radius: 4px;
                                    transition: all 0.2s;
                                    min-width: 34px;
                                    height: 34px;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                }

                                .btn-group .btn i {
                                    font-size: 14px;
                                    margin: 0;
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

                                .table-responsive {
                                    -webkit-overflow-scrolling: touch;
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
        $("#trainerTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#trainerTable_wrapper .col-md-6:eq(0)');
    });
</script>