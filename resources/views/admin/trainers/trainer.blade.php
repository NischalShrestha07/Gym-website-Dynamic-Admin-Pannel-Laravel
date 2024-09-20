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
                                            <form action="{{ url('add-trainer') }}" method="POST"
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
                                    <!-- Populate trainer data here -->
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