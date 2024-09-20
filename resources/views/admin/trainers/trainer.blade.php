@extends('admin.layout')

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
                    <h1>Trainer Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Trainers</li>
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
                            <h2 class="ml-2">Trainers</h2>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#addTrainerModal">Add New Trainer</button>
                        </div>

                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif


                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <!-- Add Trainer Modal -->
                            <div class="modal fade" id="addTrainerModal" tabindex="-1" role="dialog"
                                aria-labelledby="addTrainerModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h4 class="modal-title" id="addTrainerModalLabel">Add New Trainer</h4>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ url('AddNewTrainer') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name" class="font-weight-bold">Name:</label>
                                                    <input type="text" id="name" name="name"
                                                        placeholder="Enter Trainer Name" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone" class="font-weight-bold">Phone:</label>
                                                    <input type="text" id="phone" name="phone"
                                                        placeholder="Enter Phone Number" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="description"
                                                        class="font-weight-bold">Description:</label>
                                                    <textarea id="description" name="description"
                                                        placeholder="Enter Description" class="form-control"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="expertise" class="font-weight-bold">Expertise:</label>
                                                    <input type="text" id="expertise" name="expertise"
                                                        placeholder="Enter Expertise" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="years_of_experience" class="font-weight-bold">Years of
                                                        Experience:</label>
                                                    <input type="number" id="years_of_experience"
                                                        name="years_of_experience"
                                                        placeholder="Enter Years of Experience" class="form-control"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="qualifications"
                                                        class="font-weight-bold">Qualifications:</label>
                                                    <input type="text" id="qualifications" name="qualifications"
                                                        placeholder="Enter Qualifications" class="form-control">
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

                            <table id="trainerTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Phone</th>
                                        <th>Description</th>
                                        <th>Expertise</th>
                                        <th>Experience (Years)</th>
                                        <th>Qualifications</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trainers as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->image }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->description}}</td>
                                        <td>{{ $item->expertise }}</td>
                                        <td>{{ $item->years_of_experience }}</td>
                                        <td>{{ $item->qualifications }}</td>
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
                                                                Trainer Details</h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Enhanced Trainer Details Card -->
                                                            <div class="card">
                                                                <div class="card-header bg-dark text-white">
                                                                    <h5 class="card-title mb-0">Trainer's Information
                                                                    </h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <!-- Trainer's Image -->
                                                                        <div class="col-md-4 text-center">
                                                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                                                alt="{{ $item->name }}"
                                                                                class="img-fluid rounded shadow"
                                                                                style="max-height: 250px; width: auto;">
                                                                        </div>
                                                                        <!-- Trainer's Details -->
                                                                        <div class="col-md-8">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Name:</strong></h6>
                                                                                    <p>{{ $item->name }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Phone Number:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->phone }}</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Expertise:</strong></h6>
                                                                                    <p>{{ $item->expertise }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Years of
                                                                                            Experience:</strong></h6>
                                                                                    <p>{{ $item->years_of_experience }}
                                                                                        years</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Qualifications:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->qualifications }}</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6><strong>Description:</strong>
                                                                                    </h6>
                                                                                    <p>{{ $item->description ?: 'N/A' }}
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
                                                            <h4 class="modal-title"><b>Update Supplier</b></h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        {{-- <div class="modal-body">
                                                            <form action="{{ url('UpdateSupplier') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')

                                                                <input type="hidden" name="id" value="{{ $item->id }}">

                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Supplier
                                                                        Name:</label>
                                                                    <input type="text" id="name" name="name"
                                                                        value="{{$item->name}}"
                                                                        placeholder="Enter Supplier Name:"
                                                                        class="form-control mb-2">

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="address">Address:</label>
                                                                    <input type="text" id="address" name="address"
                                                                        value="{{ $item->address }}"
                                                                        class="form-control mb-2">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="code">Code:</label>
                                                                    <input type="text" id="code" name="code"
                                                                        value="{{ $item->code }}"
                                                                        class="form-control mb-2">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="pan">PAN:</label>
                                                                    <input type="text" id="pan" name="pan"
                                                                        value="{{ $item->pan }}"
                                                                        class="form-control mb-2">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="phoneno">Phone Number:</label>
                                                                    <input type="text" id="phoneno" name="phoneno"
                                                                        value="{{ $item->phoneno }}"
                                                                        class="form-control mb-2">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email">Email Address:</label>
                                                                    <input type="email" id="email" name="email"
                                                                        value="{{ $item->email }}"
                                                                        class="form-control mb-2">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="group">Group:</label>
                                                                    <select class="form-control" name="group"
                                                                        id="group">
                                                                        <option value="{{$item->group}}" selected>
                                                                            {{$item->group}}</option>
                                                                        <option value="abc enterprise">abc enterprise
                                                                        </option>
                                                                        <option value="Ramesh Trader">Ramesh Trader
                                                                        </option>
                                                                        <option value="Prakash Store">Prakash Store
                                                                        </option>
                                                                        <option value="Om Trader">Om Trader</option>
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="cterms">Credit Terms:</label>
                                                                    <select class="form-control" name="cterms"
                                                                        id="cterms">
                                                                        <option value="{{$item->cterms}}" selected>
                                                                            {{$item->cterms}}</option>
                                                                        <option value="NET 30">NET 30
                                                                        </option>
                                                                        <option value="NET 45">NET 45
                                                                        </option>
                                                                        <option value="NET 60">NET 60
                                                                        </option>
                                                                        <option value="NET 90">NET 90
                                                                        </option>

                                                                    </select>


                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="climit">Credit Limit:</label>
                                                                    <input type="text" id="climit" name="climit"
                                                                        value="{{ $item->climit }}"
                                                                        class="form-control mb-2">
                                                                </div>

                                                                <div class="d-grid">
                                                                    <button type="submit" name="save"
                                                                        class="btn btn-success" value="Save Changes"><i
                                                                            class="fas fa-save"></i>
                                                                        Save Changes</button>
                                                                </div>
                                                            </form>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>

                                            <form action="{{ route('supplier.destroy', $item->id) }}" method="POST"
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
        $("#trainerTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#trainerTable_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection