<x-adminheader />
<!-- partial -->
<div class="main-panel">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="box d-flex justify-content-between">
                        <p class="card-title mb-0 text-danger">Our Trainers</p>

                        <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                            data-target="#addNewTrainer">
                            Add New Trainer
                        </button>
                    </div>
                    <div>
                        @if (session('success'))
                        <div class="alert alert-success bg-success text-white rounded fw-bold">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-danger text-white bg-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>

                    <!-- Button to Open the Modal for Adding New Trainer -->


                    <!-- Add New Trainer Modal -->
                    <div class="modal fade" id="addNewTrainer">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header  bg-primary ">
                                    <h4 class="modal-title h2 text-white">Add New Trainer</h4>
                                    <button type="button" class="close custom-close "
                                        data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form action="{{ url('AddNewTrainer') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="photo">Trainer Photo:</label>
                                            <input type="file" id="photo" name="photo" class="form-control mb-2">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" id="name" name="name" class="form-control mb-2"
                                                placeholder="Enter Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="facebook">Facebook:</label>
                                            <input type="url" id="facebook" name="facebook" class="form-control mb-2"
                                                placeholder="Enter Facebook URL">
                                        </div>

                                        <div class="form-group">
                                            <label for="twitter">Twitter:</label>
                                            <input type="url" id="twitter" name="twitter" class="form-control mb-2"
                                                placeholder="Enter Twitter URL">
                                        </div>

                                        <div class="form-group">
                                            <label for="instagram">Instagram:</label>
                                            <input type="url" id="instagram" name="instagram" class="form-control mb-2"
                                                placeholder="Enter Instagram URL">
                                        </div>

                                        <button type="submit" class="btn btn-success btn-block">Save Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Trainers Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Instagram</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trainers as $i => $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img src="/storage/{{ $item->photo }}" width="100px" alt="Trainer Photo">
                                    </td>
                                    <td>{{ $item->facebook }}</td>
                                    <td>{{ $item->twitter }}</td>
                                    <td>{{ $item->instagram }}</td>
                                    <td class="font-weight-medium">
                                        <!-- Update Button -->
                                        <button style="margin: 10px;" type="button" class="btn btn-primary"
                                            data-toggle="modal" data-target="#updateTrainer{{ $i }}">
                                            Update
                                        </button>

                                        <!-- Update Modal -->
                                        <div class="modal fade" id="updateTrainer{{ $i }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title ">Update Trainer</h4>
                                                        <button type="button" class="close custom-close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="{{ url('UpdateTrainer') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="form-group">
                                                                <label for="photo">Trainer Photo:</label>
                                                                <input type="file" id="photo" name="photo"
                                                                    class="form-control mb-2">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="name">Name:</label>
                                                                <input type="text" id="name" name="name"
                                                                    value="{{ $item->name }}" class="form-control mb-2">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="facebook">Facebook:</label>
                                                                <input type="url" id="facebook" name="facebook"
                                                                    value="{{ $item->facebook }}"
                                                                    class="form-control mb-2">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="twitter">Twitter:</label>
                                                                <input type="url" id="twitter" name="twitter"
                                                                    value="{{ $item->twitter }}"
                                                                    class="form-control mb-2">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="instagram">Instagram:</label>
                                                                <input type="url" id="instagram" name="instagram"
                                                                    value="{{ $item->instagram }}"
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
                                        <form action="{{ route('trainers.destroy', $item->id) }}" method="POST"
                                            style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this trainer?')">
                                                Delete
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
</div>

<x-adminfooter />