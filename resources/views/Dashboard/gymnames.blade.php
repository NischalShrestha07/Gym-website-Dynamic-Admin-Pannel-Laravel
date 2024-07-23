<x-adminheader />

<!-- partial -->
<div class="main-panel">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">GymNames Details</p>
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewGymName">
                        Add New
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="addNewGymName">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New GymName</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{ url('AddNewGymName') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label for="gymname">Gym Name:</label>
                                        <input type="text" id="gymname" name="gymname" placeholder="Enter Gym Nav Name:"
                                            class="form-control mb-2">

                                        <label for="home">Home Nav Name:</label>
                                        <input type="text" id="home" name="home" placeholder="Enter Home Nav Name:"
                                            class="form-control mb-2">

                                        <label for="whyus">Whyus Nav Name:</label>
                                        <input type="text" id="whyus" name="whyus" placeholder="Enter Whyus Nav Name:"
                                            class="form-control mb-2">

                                        <label for="trainers">Trainers Nav Name:</label>
                                        <input type="text" id="trainers" name="trainers"
                                            placeholder="Enter Trainers Nav Name:" class="form-control mb-2">

                                        <label for="contactus">Contactus Nav Name:</label>
                                        <input type="text" id="contactus" name="contactus"
                                            placeholder="Enter Contactus Nav Name:" class="form-control mb-2">




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
                                    <th>Gym Name</th>
                                    <th>HomeNav Name</th>
                                    <th>WhyusNav Name</th>
                                    <th>TrainersNav Name</th>
                                    <th>ContactNav Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>


                            {{-- WE NEED TO CHANGE THIS AFTER FILLING CONTROLLER --}}
                            <tbody>
                                @php
                                $i=0;
                                @endphp
                                @foreach ($gymnames as $item)
                                @php
                                $i++;
                                @endphp
                                <tr>
                                    <td>{{ $item->gymname }}</td>
                                    <td>{{ $item->home }}</td>
                                    <td>{{ $item->whyus }}</td>
                                    <td>{{ $item->trainers }}</td>
                                    <td>{{ $item->contactus }}</td>

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
                                                        <h4 class="modal-title">Update GymName</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('UpdateGymName') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')


                                                            <label for="gymname">Gym Name:</label>
                                                            <input type="text" value="{{$item->gymname}}" id="gymname"
                                                                name="gymname" placeholder="Enter Gym Nav Name:"
                                                                class="form-control mb-2">

                                                            <label for=home"">Home Nav Name:</label>
                                                            <input type="text" value="{{$item->home}}" id="home"
                                                                name="home" placeholder="Enter Home Nav Name:"
                                                                class="form-control mb-2">

                                                            <label for="whyus">Whyus Nav Name:</label>
                                                            <input type="text" value="{{$item->whyus}}" id="whyus"
                                                                name="whyus" placeholder="Enter Whyus Nav Name:"
                                                                class="form-control mb-2">

                                                            <label for="trainers">Trainers Nav Name:</label>
                                                            <input type="text" value="{{$item->trainers}}" id="trainers"
                                                                name="trainers" placeholder="Enter Trainers Nav Name:"
                                                                class="form-control mb-2">

                                                            <label for="contactus">Contactus Nav Name:</label>
                                                            <input type="text" value="{{$item->contactus}}"
                                                                id="contactus" name="contactus"
                                                                placeholder="Enter Contactus Nav Name:"
                                                                class="form-control mb-2">



                                                            <input type="hidden" name="id" value="{{$item->id}}">
                                                            <input type="submit" name="save" class="btn btn-success"
                                                                value="Save Changes" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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