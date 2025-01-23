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
                            <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog"
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
                            </div>


                            <table id="EmployeeTable" class="table table-bordered table-striped">
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
                                        {{-- <td>{{ $item->image }}</td> --}}
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
                            </table>
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