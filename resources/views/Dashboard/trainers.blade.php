<x-adminheader />

<!-- partial -->
<div class="main-panel">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Trainers</p>
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewTrainer">
                        Add New
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="addNewTrainer">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Trainer</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{ url('AddNewTrainer') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label for="">Name:</label>
                                        <input type="text" id="name" name="name" placeholder="Enter Name:"
                                            class="form-control mb-2">

                                        <label for="photo">Trainer Photo:</label>
                                        <input type="file" id="photo" name="photo" class="form-control mb-2">

                                        <label for="facebook">Facebook</label>
                                        <input type="url" id="facebook" name="facebook" class="form-control mb-2">

                                        <label for="twitter">Twitter</label>
                                        <input type="url" id="twitter" name="twitter" class="form-control mb-2">

                                        <label for="instagram">Instagram</label>
                                        <input type="url" id="instagram" name="instagram" class="form-control mb-2">

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
                                    <th>Photo</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Instagram</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- @php
                                $i=0;
                                @endphp
                                @foreach ($datas as $item)
                                @php
                                $i++;
                                @endphp --}}

                                {{-- THIS NEEDED TO BE CHANGED --}}

                                {{-- <tr>
                                    <td>{{ $item->title }}</td>
                                    <td><img src="{{ url('uploads/datas/'.$item->homeimage) }}" width="100px" alt="">
                                    </td>
                                    <td>{{ $item->description }}</td>
                                    <td><img src="{{ url('uploads/datas/'.$item->contactimage) }}" width="100px" alt="">
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
                                                        <h4 class="modal-title">Update Data</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('UpdateData') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <label for="">Title</label>
                                                            <input type="text" id="title" name="title"
                                                                value="{{$item->title}}" placeholder="Enter Title"
                                                                class="form-control mb-2">
                                                            <label for="homeimage">HomeImage</label>
                                                            <input type="file" id="homeimage" name="homeimage"
                                                                class="form-control mb-2">
                                                            <label for="description">Description</label>
                                                            <input type="text" id="description"
                                                                value="{{$item->description}}" name="description"
                                                                placeholder="Enter Description"
                                                                class="form-control mb-2">
                                                            <label for="contactimage">ContactImage</label>
                                                            <input type="file" id="contactimage" name="contactimage"
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
                                </tr> --}}
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>


<x-adminfooter />