<x-adminheader />

<!-- partial -->
<div class="main-panel">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Message Details</p>
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
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewContact">
                        Add New
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="addNewContact">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Contact</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{ url('AddNewContact') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label for="">FullName:</label>
                                        <input type="text" id="name" name="name" placeholder="Enter Name:"
                                            class="form-control mb-2">

                                        <label for="email">Email:</label>
                                        <input type="text" id="email" name="email" class="form-control mb-2">

                                        <label for="phoneNo">Phone Number:</label>
                                        <input type="text" id="phoneNo" name="phoneNo" class="form-control mb-2">

                                        <label for="message">Message:</label>
                                        <input type="text" id="message" name="message" class="form-control mb-2">

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
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Message</th>

                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $i=0;
                                @endphp
                                @foreach ($contacts as $item)
                                @php
                                $i++;
                                @endphp

                                {{-- THIS NEEDED TO BE CHANGED --}}

                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phoneNo}}</td>
                                    <td>{{$item->message}}</td>
                                    </td>
                                    <td class="font-weight-medium">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#updateModel{{$i}}">
                                            Update
                                        </button>
                                        <div class="modal" id="updateModel{{$i}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Contact</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('UpdateContact') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <label for="">Full Name:</label>
                                                            <input type="text" id="name" name="name"
                                                                value="{{$item->name}}" placeholder="Enter Name"
                                                                class="form-control mb-2">

                                                            <label for="email">Email</label>
                                                            <input type="email" id="email" value="{{$item->email}}"
                                                                name="email" class="form-control mb-2">

                                                            <label for="phoneNo">Phone Number</label>
                                                            <input type="text" value="{{$item->phoneNo}}" id="phoneNo"
                                                                name="phoneNo" class="form-control mb-2">

                                                            <label for="message">Message</label>
                                                            <input type="text" id="message" value="{{$item->message}}"
                                                                name="message" class="form-control mb-2">

                                                            <input type="hidden" name="id" value="{{$item->id}}">
                                                            <input type="submit" name="save" class="btn btn-success"
                                                                value="Save Changes" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="{{route('trainers.destroy',$item->id)}}" method="POST"
                                            style="display: inline">
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