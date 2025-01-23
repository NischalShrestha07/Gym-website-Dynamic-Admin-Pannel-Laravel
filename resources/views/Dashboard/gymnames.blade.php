{{--
<x-adminheader /> --}}

<!-- partial -->
{{-- <div class="main-panel">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body navbar">
                    <p class="card-title mb-0 text-danger">Gym Names Details</p>

                    <!-- Success Message -->
                    <div>
                        @if (session('success'))
                        <div class="alert alert-success text-white bg-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger text-white bg-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>

                    <!-- Button to Open Modal for Adding New Gym Name -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addNewGymName">
                        Add New Menu Items
                    </button>

                    <!-- Modal for Adding New Gym Name -->
                    <div class="modal" id="addNewGymName">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title h2">Add New Gym Name</h4>
                                    <button type="button" class="close custom-close"
                                        data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('AddNewGymName') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <!-- Gym Name Input -->

                                        <div class="form-group">
                                            <label for="gymname">Gym Name:</label>
                                            <input type="text" id="gymname" name="gymname"
                                                placeholder="Enter Gym Nav Name" class="form-control mb-2">

                                            @error('gymname')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>



                                        <!-- Other Inputs -->
                                        <div class="form-group">
                                            <label for="home">Home Nav Name:</label>
                                            <input type="text" id="home" name="home" placeholder="Enter Home Nav Name"
                                                class="form-control mb-2">

                                        </div>
                                        <div class="form-group">
                                            <label for="whyus">Whyus Nav Name:</label>
                                            <input type="text" id="whyus" name="whyus"
                                                placeholder="Enter Whyus Nav Name" class="form-control mb-2">
                                        </div>
                                        <div class="form-group">

                                        </div>
                                        <div class="form-group">
                                            <label for="trainers">Trainers Nav Name:</label>
                                            <input type="text" id="trainers" name="trainers"
                                                placeholder="Enter Trainers Nav Name" class="form-control mb-2">
                                        </div>
                                        <div class="form-group">
                                            <label for="contactus">Contactus Nav Name:</label>
                                            <input type="text" id="contactus" name="contactus"
                                                placeholder="Enter Contactus Nav Name" class="form-control mb-2">
                                        </div>



                                        <!-- Submit Button -->
                                        <input type="submit" name="save" class="btn btn-success" value="Save Now" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gym Names Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Gym Name</th>
                                    <th>Home Nav Name</th>
                                    <th>Whyus Nav Name</th>
                                    <th>Trainers Nav Name</th>
                                    <th>Contact Nav Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gymnames as $i => $item)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $item->gymname }}</td>
                                    <td>{{ $item->home }}</td>
                                    <td>{{ $item->whyus }}</td>
                                    <td>{{ $item->trainers }}</td>
                                    <td>{{ $item->contactus }}</td>
                                    <td>
                                        <!-- Update Gym Name Button -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#updateModel{{ $i }}">
                                            Update
                                        </button>

                                        <!-- Update Gym Name Modal -->
                                        <div class="modal" id="updateModel{{ $i }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h4 class="modal-title h2 text-white">Update Gym Name</h4>
                                                        <button type="button" class="close custom-close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('UpdateGymName') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <!-- Gym Name Input -->
                                                            <label for="gymname">Gym Name:</label>
                                                            <input type="text" value="{{ $item->gymname }}" id="gymname"
                                                                name="gymname" class="form-control mb-2">

                                                            <!-- Other Inputs -->
                                                            <label for="home">Home Nav Name:</label>
                                                            <input type="text" value="{{ $item->home }}" id="home"
                                                                name="home" class="form-control mb-2">

                                                            <label for="whyus">Whyus Nav Name:</label>
                                                            <input type="text" value="{{ $item->whyus }}" id="whyus"
                                                                name="whyus" class="form-control mb-2">

                                                            <label for="trainers">Trainers Nav Name:</label>
                                                            <input type="text" value="{{ $item->trainers }}"
                                                                id="trainers" name="trainers" class="form-control mb-2">

                                                            <label for="contactus">Contactus Nav Name:</label>
                                                            <input type="text" value="{{ $item->contactus }}"
                                                                id="contactus" name="contactus"
                                                                class="form-control mb-2">

                                                            <!-- Hidden Input for ID -->
                                                            <input type="hidden" name="id" value="{{ $item->id }}">

                                                            <!-- Submit Button -->
                                                            <input type="submit" name="save" class="btn btn-success"
                                                                value="Save Changes" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Gym Name Button -->
                                        <form action="{{ route('gymnames.destroy', $item->id) }}" style="display:inline"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
</div> --}}



{{--
<x-adminfooter /> --}}


<x-adminheader />

<style>
    .table-responsive {
        overflow-x: auto;
        width: 100%;
    }

    .table th,
    .table td {
        border: 1px solid #eaeaea;
        padding: 12px;
        text-align: left;
        vertical-align: middle;
        word-wrap: break-word;
        overflow-wrap: break-word;
        white-space: normal;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: bold;
        color: #333;
        text-transform: uppercase;
        font-size: 14px;
    }

    .table td img {
        border-radius: 5px;
        object-fit: cover;
    }

    .btn-primary,
    .btn-success,
    .btn-danger {
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #00408f;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .modal-header {
        background-color: #007bff;
        color: white;
        border-bottom: none;
    }

    .modal-content {
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .modal-title {
        font-size: 18px;
    }

    .close {
        color: white;
    }

    .form-control {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ced4da;
    }

    .alert {
        font-size: 18px;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    @media (max-width: 768px) {
        .table thead {
            display: none;
        }

        .table td {
            display: block;
            width: 100%;
            text-align: right;
            position: relative;
            padding-left: 50%;
        }

        .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 10px;
            font-weight: bold;
            text-align: left;
        }

        .custom-close {
            font-size: 2rem;
            color: white;
            opacity: 1;
            outline: none;
        }

        .custom-close:hover {
            color: #f0f0f0;
        }
    }
</style>

<!-- partial -->
<div class="main-panel">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body navbar">
                    <p class="card-title mb-0 h1 text-danger">Gym Names Details</p>

                    <!-- Success and Error Alert Messages -->
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

                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addNewGymName">
                        Add New
                    </button>

                    <!-- Add New Modal -->
                    <div class="modal fade" id="addNewGymName">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title h2">Add New Menu Item</h4>
                                    <button type="button" class="close custom-close"
                                        data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form action="{{ url('AddNewGymName') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="gymname">Gym Name:</label>
                                            <input type="text" id="gymname" name="gymname"
                                                placeholder="Enter Gym Nav Name" class="form-control mb-2">

                                            @error('gymname')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>



                                        <!-- Other Inputs -->
                                        <div class="form-group">
                                            <label for="home">Home Nav Name:</label>
                                            <input type="text" id="home" name="home" placeholder="Enter Home Nav Name"
                                                class="form-control mb-2">

                                        </div>

                                        <div class="form-group">
                                            <label for="whyus">Whyus Nav Name:</label>
                                            <input type="text" id="whyus" name="whyus"
                                                placeholder="Enter Whyus Nav Name" class="form-control mb-2">
                                        </div>

                                        <div class="form-group">
                                            <label for="trainers">Trainers Nav Name:</label>
                                            <input type="text" id="trainers" name="trainers"
                                                placeholder="Enter Trainers Nav Name" class="form-control mb-2">
                                        </div>

                                        <div class="form-group">
                                            <label for="contactus">ContactUs Nav Name:</label>
                                            <input type="text" id="contactus" name="contactus"
                                                placeholder="Enter Contactus Nav Name" class="form-control mb-2">
                                        </div>

                                        <button type="submit" class="btn btn-success btn-block">Save Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table with Gym Names Details -->
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Gym Name</th>
                                    <th>Home Nav Name</th>
                                    <th>Whyus Nav Name</th>
                                    <th>Trainers Nav Name</th>
                                    <th>Contact Nav Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($gymnames as $i => $item)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $item->gymname }}</td>
                                    <td>{{ $item->home }}</td>
                                    <td>{{ $item->whyus }}</td>
                                    <td>{{ $item->trainers }}</td>
                                    <td>{{ $item->contactus }}</td>
                                    <td>
                                        <!-- Update Gym Name Button -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#updateModel{{ $i }}">
                                            Update
                                        </button>

                                        <!-- Update Gym Name Modal -->
                                        <div class="modal" id="updateModel{{ $i }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h4 class="modal-title h2 text-white">Update Gym Name</h4>
                                                        <button type="button" class="close custom-close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('UpdateGymName') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <!-- Gym Name Input -->
                                                            <div class="form-group">
                                                                <label for="gymname">Gym Name:</label>
                                                                <input type="text" value="{{ $item->gymname }}"
                                                                    id="gymname" name="gymname"
                                                                    class="form-control mb-2">
                                                            </div>

                                                            <!-- Other Inputs -->
                                                            <div class="form-group">
                                                                <label for="home">Home Nav Name:</label>
                                                                <input type="text" value="{{ $item->home }}" id="home"
                                                                    name="home" class="form-control mb-2">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="whyus">Whyus Nav Name:</label>
                                                                <input type="text" value="{{ $item->whyus }}" id="whyus"
                                                                    name="whyus" class="form-control mb-2">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="trainers">Trainers Nav Name:</label>
                                                                <input type="text" value="{{ $item->trainers }}"
                                                                    id="trainers" name="trainers"
                                                                    class="form-control mb-2">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="contactus">Contactus Nav Name:</label>
                                                                <input type="text" value="{{ $item->contactus }}"
                                                                    id="contactus" name="contactus"
                                                                    class="form-control mb-2">
                                                            </div>

                                                            <!-- Hidden Input for ID -->
                                                            <input type="hidden" name="id" value="{{ $item->id }}">

                                                            <!-- Submit Button -->
                                                            <input type="submit" name="save" class="btn btn-success"
                                                                value="Save Changes" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Gym Name Button -->
                                        <form action="{{ route('gymnames.destroy', $item->id) }}" style="display:inline"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
</div>

<x-adminfooter />