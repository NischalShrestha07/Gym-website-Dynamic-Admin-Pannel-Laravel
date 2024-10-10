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
                    <h1>Membership Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                    <strong>Error!</strong> {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                            </div>

                            <!-- Add Trainer Modal -->
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
                                                <div class="form-group">
                                                    <label for="member_name" class="font-weight-bold">Member
                                                        Name:</label>
                                                    <input type="text" id="member_name" name="member_name"
                                                        placeholder=" Member Name" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="membership_type" class="font-weight-bold">Membership
                                                        Type:</label>
                                                    <input type="text" id="membership_type" name="membership_type"
                                                        placeholder=" Membership Type" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone" class="font-weight-bold">Phone:</label>
                                                    <input type="text" id="phone" name="phone"
                                                        placeholder=" Phone Number" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="font-weight-bold">Email Address:</label>
                                                    <input type="text" id="email" name="email"
                                                        placeholder="Email Address" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="start_date" class="font-weight-bold">Start Date:</label>
                                                    <input type="date" id="start_date" name="start_date"
                                                        placeholder="Start Date" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="end_date" class="font-weight-bold">End Date:</label>
                                                    <input type="date" id="end_date" name="end_date"
                                                        placeholder="End Date" class="form-control" required>
                                                </div>


                                                <div class="form-group">
                                                    <label for="address" class="font-weight-bold">Address:</label>
                                                    <input id="address" name="address" placeholder="Enter address"
                                                        class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="price" class="font-weight-bold">Price:</label>
                                                    <input id="price" name="price" placeholder="Price"
                                                        class="form-control" />
                                                </div>



                                                <div class="form-group">
                                                    <label for="memberphoto" class="font-weight-bold">Member
                                                        Photo:</label>
                                                    <input type="file" id="memberphoto" name="memberphoto"
                                                        class="form-control">
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
                                        <th>Member Name</th>
                                        <th>Image</th>
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
                                        <td>{{ $item->member_name }}</td>
                                        <td>
                                            <img style="border-radius: 50px" src="{{asset( $item->memberphoto)   }}"
                                                {{-- <img style="border-radius: 50px"
                                                src="/storage/{{ $item->memberphoto }}" --}} width="100px"
                                                alt="Trainer Photo">
                                        </td>
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
                                                                        <!-- Member's Image -->
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
                                                                                {{-- <div class="col-md-6">
                                                                                    <h6><strong>Years of
                                                                                            Experience:</strong></h6>
                                                                                    <p>{{ $item->years_of_experience }}
                                                                                        years</p>
                                                                                </div> --}}
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

                                            {{-- <div class="modal" id="updateModel{{ $item->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header btn-primary">
                                                            <h4 class="modal-title"><b>Update Trainer</b></h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('UpdateDataTrainer') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')


                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Trainer's
                                                                        Name:</label>
                                                                    <input type="text" id="name" name="name"
                                                                        value="{{$item->name}}"
                                                                        placeholder="Enter Trainer's Name:"
                                                                        class="form-control mb-2">

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="phone">Phone No:</label>
                                                                    <input type="text" id="phone" name="phone"
                                                                        value="{{ $item->phone }}"
                                                                        class="form-control mb-2">
                                                                </div>



                                                                <div class="mb-3">
                                                                    <label for="expertise">Trainer's Expertise:</label>
                                                                    <input type="text" id="expertise" name="expertise"
                                                                        value="{{ $item->expertise }}"
                                                                        class="form-control mb-2">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="years_of_experience">Years Of
                                                                        Experience:</label>
                                                                    <input type="text" id="years_of_experience"
                                                                        name="years_of_experience"
                                                                        value="{{ $item->years_of_experience }}"
                                                                        class="form-control mb-2">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="qualifications">Trainer's
                                                                        Qualifications:</label>
                                                                    <input type="qualifications" id="qualifications"
                                                                        name="qualifications"
                                                                        value="{{ $item->qualifications }}"
                                                                        class="form-control mb-2">
                                                                </div>


                                                                <div class="mb-3">
                                                                    <label for="image">Trainer's Image:</label>
                                                                    <input type="file" id="image" name="image"
                                                                        value="{{ $item->image }}"
                                                                        class="form-control mb-2">
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
                                            </div> --}}

                                            {{-- <form action="{{route('datatrainer.destroy',$item->id)}}" method="POST"
                                                style="display:inline-block;"> @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm w-10" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                                    <i class="fas fa-lg fa-trash-alt"></i>
                                                </button>
                                            </form> --}}
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