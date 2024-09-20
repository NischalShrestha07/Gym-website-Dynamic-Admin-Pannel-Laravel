<x-adminheader />

<!-- partial -->
<div class="main-panel">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body navbar">
                    <p class="card-title mb-0 text-danger">Footerbar Details</p>
                    <!-- Button to Open the Modal -->
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewFooterbar">
                        Add New
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="addNewFooterbar">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Footerbar</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{ url('AddNewFooterbar') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label for="">Name:</label>
                                        <input type="text" id="name" name="name" placeholder="Enter Name:"
                                            class="form-control mb-2">

                                        <label for="pic">Picture:</label>
                                        <input type="file" id="pic" name="pic" class="form-control mb-2">
                                        {{-- <td><img src="{{ url('uploads/footerbars/'.$item->pic) }}" width="100px"
                                                alt=""> --}}



                                            <input type="submit" name="save" class="btn btn-success" value="Save Now" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Picture</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($footerbars as $item)
                                @php
                                $i++;
                                @endphp
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td
                                        style="background:rgb(212, 244, 251); display:inline;display:flex;justify-content:center; align-items: center">
                                        <img src="{{ asset('storage/' . $item->pic) }}" width="100px" alt="">
                                    </td>
                                    {{-- <td
                                        style="background:rgb(212, 244, 251); display:inline;display:flex;justify-content:center; align-items: center">
                                        <img src="/storage/{{ $item->pic }}" width="100px" alt="">
                                    </td> --}}
                                    </td>
                                    <td class="font-weight-medium">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#updateModel{{ $i }}">
                                            Update
                                        </button>

                                        <div class="modal" id="updateModel{{ $i }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Footerbars</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('UpdateFooterbar') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <label for="name">Name:</label>
                                                            <input type="text" id="name" name="name"
                                                                value="{{ $item->name }}" placeholder="Enter Name"
                                                                class="form-control mb-2">

                                                            <label for="pic">Picture:</label>
                                                            <input type="file" id="pic" name="pic"
                                                                class="form-control mb-2">

                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                            <input type="submit" name="save" class="btn btn-success"
                                                                value="Save Changes" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('footerbar.destroy', $item->id) }}" method="POST"
                                            enctype="multipart/form-data" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Do you want to delete it ?')">Delete</button>

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