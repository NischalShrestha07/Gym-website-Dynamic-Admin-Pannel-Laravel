<x-adminheader />

<style>
    .table-responsive {
        overflow-x: auto;
        /* Allow horizontal scrolling for small screens */
        width: 100%;
    }

    .table th,
    .table td {
        border: 1px solid #eaeaea;
        padding: 12px;
        text-align: left;
        vertical-align: middle;
        /* Center vertically */
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
        /* Ensure the image doesn't stretch */
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        box-shadow: 0 4px 6px rgba(0, 123, 255, 0.4);
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #00408f;
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

    /* Table responsiveness for smaller screens */
    @media (max-width: 768px) {
        .table thead {
            display: none;
            /* Hide headers on small screens */
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
            /* Increase size */
            color: white;
            /* Set color to white */
            opacity: 1;
            /* Ensure full opacity */
            outline: none;
        }

        .custom-close:hover {
            color: #f0f0f0;
            /* Slight change on hover for a subtle effect */
        }
    }
</style>

<!-- partial -->
<div class="main-panel">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body navbar">
                    <p class="card-title mb-0 h1 text-danger">WhyUs Details</p>

                    <!-- Success and Error Alert Messages -->
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

                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addNewWhyus">
                        Add New
                    </button>

                    <!-- Add New Modal -->
                    <div class="modal fade" id="addNewWhyus">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title h2">Add New Whyus</h4>
                                    <button type="button" class="close custom-close "
                                        data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form action="{{ url('AddNewWhyus') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="img">Whyus Photo:</label>
                                            <input type="file" id="img" name="img" class="form-control mb-2">
                                        </div>

                                        <div class="form-group">
                                            <label for="title">Title:</label>
                                            <input type="text" id="title" name="title" class="form-control mb-2"
                                                placeholder="Enter title:">
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description:</label>
                                            <input type="text" id="description" name="description"
                                                class="form-control mb-2" placeholder="Enter description:">
                                        </div>

                                        <div class="form-group">
                                            <label for="head">Head:</label>
                                            <input type="text" id="head" name="head" class="form-control mb-2"
                                                placeholder="Enter header:">
                                        </div>

                                        <div class="form-group">
                                            <label for="headdetail">Head Detail:</label>
                                            <textarea id="headdetail" name="headdetail" placeholder="Enter details:"
                                                class="form-control mb-2"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-success btn-block">Save Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table with WhyUs Details -->
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Header</th>
                                    <th>Header Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($whyuss as $item)
                                @php $i++; @endphp
                                <tr>
                                    <td data-label="Photo">
                                        <img src="/storage/{{ $item->img }}" width="100px" alt="WhyUs Photo">
                                    </td>
                                    <td data-label="Title">{{ $item->title }}</td>
                                    <td data-label="Description">{{ $item->description }}</td>
                                    <td data-label="Header">{{ $item->head }}</td>
                                    <td data-label="Header Details">{{ $item->headdetail }}</td>
                                    <td class="font-weight-medium">
                                        <!-- Update Button -->
                                        <button style="margin: 10px;" type="button" class="btn btn-primary"
                                            data-toggle="modal" data-target="#updateModel{{ $i }}">
                                            Update
                                        </button>

                                        <!-- Update Modal -->
                                        <div class="modal fade" id="updateModel{{ $i }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title h2">Update WhyUs</h4>
                                                        <button type="button" class="close custom-close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="{{ url('UpdateWhyus') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="form-group">
                                                                <label for="img">Photo:</label>
                                                                <input type="file" id="img" name="img"
                                                                    class="form-control mb-2">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title">Title:</label>
                                                                <input type="text" id="title" name="title"
                                                                    value="{{ $item->title }}"
                                                                    class="form-control mb-2">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="description">Description:</label>
                                                                <input type="text" id="description" name="description"
                                                                    value="{{ $item->description }}"
                                                                    class="form-control mb-2">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="head">Head:</label>
                                                                <input type="text" id="head" name="head"
                                                                    value="{{ $item->head }}" class="form-control mb-2">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="headdetail">Head Detail:</label>
                                                                <input type="text" id="headdetail" name="headdetail"
                                                                    value="{{ $item->headdetail }}"
                                                                    class="form-control mb-2">
                                                            </div>

                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                            <button type="submit" class="btn btn-success btn-block">Save
                                                                Changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Form -->
                                        <form action="{{ route('whyuss.destroy', $item->id) }}" method="POST"
                                            style="display:inline-block;" style="margin: 10px;">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <button type="submit" class="btn btn-danger"></button> --}}
                                            <button type="submit" class="btn btn-sm btn-danger w-10"
                                                style="padding:15px 30px;" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this item?')">
                                                Delete </button>
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