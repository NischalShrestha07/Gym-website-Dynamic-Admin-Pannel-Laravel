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
                                    <strong>Error!</strong> {{ session('error') }}
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


                                        <div class="modal-body">
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
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <table id="ClientTable" class="table table-bordered table-striped">
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
        $("#ClientTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#ClientTable_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection