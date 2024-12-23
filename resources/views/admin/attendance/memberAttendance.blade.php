@extends('admin.layouts.memberLayout')

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
                    <h1>Attendance </h1>
                    <p>Dashboard/Attendance</p>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
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
                            <h2 class="ml-2">Attendance</h2>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#addAttendanceModal">Add New Attendance</button>
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
                                    <strong>Error!</strong> {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                            </div>

                            <!-- Add Client Modal -->
                            <div class="modal fade" id="addAttendanceModal" tabindex="-1" role="dialog"
                                aria-labelledby="addAttendanceModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h4 class="modal-title" id="addAttendanceModalLabel">Add New Attendance</h4>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>


                                        <div class="modal-body">
                                            <form action="{{ url('addAttendance') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="photo" class="font-weight-bold">Client Photo:</label>
                                                    <input type="file" id="photo" name="photo"
                                                        placeholder=" Client Photo" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">User</label>
                                                    <select class="form-control" name="name" id="name"
                                                        class="form-select" required>
                                                        <option value="">Select User</option>
                                                        @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="date" class="form-label">Date</label>
                                                    <input type="date" name="date" id="date" class="form-control"
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="first_in" class="form-label">First In</label>
                                                    <input type="time" name="first_in" id="first_in"
                                                        class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="break" class="form-label">Break</label>
                                                    <input type="time" name="break" id="break" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="last_out" class="form-label">Last Out</label>
                                                    <input type="time" name="last_out" id="last_out"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="capacity" class="form-label">Last Out</label>
                                                    <input type="text" name="capacity" id="capacity"
                                                        class="form-control" value="8.00" readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="total_hours" class="form-label">Total Hours</label>
                                                    <input type="text" name="total_hours" id="total_hours"
                                                        class="form-control" placeholder="Total Work Hours">
                                                </div>

                                                {{-- <div class="mb-3">
                                                    <label for="overtime" class="form-label">Total Hours</label>
                                                    <input type="text" name="overtime" id="overtime"
                                                        class="form-control" placeholder="Overtime Period">
                                                </div> --}}
                                                <div class="form-check mb-3">
                                                    <input type="checkbox" class="form-check-input" id="overtime_check"
                                                        name="overtime_check" onchange="toggleOvertime()">
                                                    <label for="overtime_check" class="form-check-label">Worked
                                                        Overtime?</label>
                                                </div>

                                                <div id="overtime_fields" style="display:none;">
                                                    <label for="overtime" class="form-label">Overtime Hours</label>
                                                    <input type="number" step="0.01" name="overtime" id="overtime"
                                                        class="form-control" placeholder="Overtime in hours">
                                                </div>



                                                <div class="mb-3">
                                                    <label for="shift" class="form-label">Shift</label>
                                                    <select class="form-control" name="shift" id="shift">
                                                        <option value="" selected>Select Option
                                                        </option>
                                                        <option value="Day Shift">Day Shift</option>
                                                        <option value="Night Shift">Night Shift</option>

                                                    </select>
                                                </div>





                                                <div class="form-group">
                                                    <label for="status" class="font-weight-bold">
                                                        Status:</label>
                                                    <select id="status" name="status" class="form-control" required>
                                                        <option value="" selected> Status
                                                        </option>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
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
                                        <th>ID</th>
                                        <th>Photo</th>
                                        {{-- <th>User</th> --}}
                                        <th>Full Name</th>
                                        <th>Date</th>
                                        <th>First In</th>
                                        <th>Break</th>
                                        <th>Last Out</th>
                                        <th>Total Hours(Hrs)</th>
                                        <th>Status</th>
                                        <th>Shift Type</th>
                                        <th>Capacity(Hrs)</th>
                                        <th>Overtime(Hrs)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <img class="img-fluid rounded-circle" src="/storage/{{ $item->photo }}"
                                                width="40px" alt="Client Photo">
                                        </td>
                                        {{-- <td>{{ $item->user->name }}</td> --}}
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->first_in }}</td>
                                        <td>{{ $item->break }}</td>
                                        <td>{{ $item->last_out }}</td>
                                        <td>{{ $item->total_hours }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->shift }}</td>
                                        <td>{{ $item->capacity }}</td>
                                        <td>{{ $item->overtime }}</td>





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
                                                                User Attendance Details</h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Enhanced client Details Card -->
                                                            <div class="card">
                                                                <div class="card-header bg-dark text-white">
                                                                    <h5 class="card-title mb-0">Attendance Information
                                                                    </h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <!-- client's Image -->
                                                                        <div class="col-md-4 text-center">
                                                                            <img src="{{ asset('storage/' . $item->photo) }}"
                                                                                alt="{{ $item->name }}"
                                                                                class="img-fluid rounded shadow"
                                                                                style="max-height: 250px;margin-top: 30px; width: 400px;">
                                                                        </div>
                                                                        <!-- client's Details -->
                                                                        <div class="col-md-8">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>ID:</strong></h6>
                                                                                    <p>{{ $item->id }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Name:</strong></h6>
                                                                                    <p>{{ $item->name }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Date:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->date }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>First In:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->first_in }}</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">

                                                                                <div class="col-md-6">
                                                                                    <h6><strong>break:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->break }}
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Capacity:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->capacity }}
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Overtime:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->overtime }}
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Last Out:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->last_out }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">

                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Total Hours:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->total_hours}}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Status:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->status}}
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Shift:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->shift}}
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
                                                            <h4 class="modal-title"><b>Update Attendance</b></h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('UpdateAttendance') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')


                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">
                                                                        Full Name:</label>
                                                                    <input type="text" id="name" name="name"
                                                                        value="{{$item->name}}"
                                                                        class="form-control mb-2">

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="date">Date:</label>
                                                                    <input type="date" id="date" name="date"
                                                                        value="{{ $item->date }}"
                                                                        class="form-control mb-2">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="first_in" class="font-weight-bold">First
                                                                        In
                                                                        :</label>
                                                                    <input type="text" id="first_in" name="first_in"
                                                                        value="{{$item->first_in}}"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="break" class="font-weight-bold">Break
                                                                        :</label>
                                                                    <input type="text" id="break" name="break"
                                                                        value="{{$item->break}}" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="last_out" class="font-weight-bold">Last
                                                                        Out:
                                                                    </label>
                                                                    <input type="text" id="last_out" name="last_out"
                                                                        value="{{$item->last_out}}"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="total_hours"
                                                                        class="font-weight-bold">Total Hours:</label>
                                                                    <input type="text" id="total_hours"
                                                                        name="total_hours"
                                                                        value="{{$item->total_hours}}"
                                                                        class="form-control">
                                                                </div>



                                                                <div class="form-group">
                                                                    <label for="shift" class="font-weight-bold">
                                                                        Shift:</label>
                                                                    <select id="shift" name="shift" class="form-control"
                                                                        required>
                                                                        <option disabled>Select Shift</option>
                                                                        <option value="Day Shift" {{ $item->shift
                                                                            == 'Day Shift' ? 'selected' : '' }}>Day
                                                                            Shift
                                                                        </option>
                                                                        <option value="Night Shift" {{ $item->shift
                                                                            == 'Night Shift' ? 'selected' : '' }}>Night
                                                                            Shift
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status" class="font-weight-bold">
                                                                        Status:</label>
                                                                    <select id="status" name="status"
                                                                        class="form-control" required>
                                                                        <option disabled> Status</option>
                                                                        <option value="Active" {{ $item->status
                                                                            == 'Active' ? 'selected' : '' }}>Active
                                                                        </option>
                                                                        <option value="Inactive" {{ $item->status
                                                                            == 'Inactive' ? 'selected' : '' }}>Inactive
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="capacity"
                                                                        class="font-weight-bold">Capacity:</label>
                                                                    <input type="textarea" id="capacity" name="capacity"
                                                                        value="{{$item->capacity}}"
                                                                        placeholder="capacity:" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="overtime"
                                                                        class="font-weight-bold">overtime:</label>
                                                                    <input type="textarea" id="overtime" name="overtime"
                                                                        value="{{$item->overtime}}"
                                                                        placeholder="overtime:" class="form-control">
                                                                </div>



                                                                <div class="form-group">
                                                                    <label for="photo"
                                                                        class="font-weight-bold">Photo:</label>
                                                                    <input type="file" id="photo"
                                                                        value="{{$item->photo}}" name="photo"
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

                                            <form action="{{route('attendance.destroy',$item->id)}}" method="POST"
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
<script>
    function toggleOvertime() {
                                                        var overtimeFields = document.getElementById('overtime_fields');
                                                        overtimeFields.style.display = overtimeFields.style.display === 'none' ? 'block' : 'none';
                                                    }
</script>
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