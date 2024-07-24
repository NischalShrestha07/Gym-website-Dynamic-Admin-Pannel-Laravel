<x-adminheader />

<!-- partial -->
<div class="main-panel">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">WhyUs Details</p>
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewWhyus">
                        Add New
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="addNewWhyus">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Whyus</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{ url('AddNewWhyus') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label for="img">Whyus Photo:</label>
                                        <input type="file" id="img" name="img" class="form-control mb-2">

                                        <label for="title">Title:</label>
                                        <input type="text" id="title" name="title" class="form-control mb-2"
                                            placeholder="Enter title:">

                                        <label for="description">Description:</label>
                                        <input type="text" id="description" name="description" class="form-control mb-2"
                                            placeholder="Enter description:">

                                        <label for="head">Head</label>
                                        <input type="text" id="head" name="head" class="form-control mb-2"
                                            placeholder="Enter header:">

                                        <label for="headdetail">Head Detail:</label>
                                        <input type="text" id="headdetail" name="headdetail"
                                            placeholder="Enter Long Details on Whyus:" class="form-control mb-2">

                                        <input type="submit" name="save" class="btn btn-success" value="Save Now" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table  table-striped table-borderless">
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
                                @php
                                $i=0;
                                @endphp
                                @foreach ($whyuss as $item)
                                @php
                                $i++;
                                @endphp
                                <tr>
                                    <td><img src="{{ url('uploads/whyuss/'.$item->img) }}" width="100px" alt="">
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->head}}</td>
                                    <td>{{$item->headdetail}}</td>
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
                                                        <h4 class="modal-title">Update Whyus</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('UpdateWhyus') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <label for="img">Photo:</label>
                                                            <input type="file" id="img" name="img"
                                                                class="form-control mb-2">

                                                            <label for="">Title:</label>
                                                            <input type="text" id="title" name="title"
                                                                value="{{$item->title}}" placeholder="Enter Title:"
                                                                class="form-control mb-2">


                                                            <label for="description">Description:</label>
                                                            <input type="text" id="description"
                                                                value="{{$item->description}}" name="description"
                                                                class="form-control mb-2">

                                                            <label for="head">Head:</label>
                                                            <input type="text" id="head" value="{{$item->head}}"
                                                                name="head" class="form-control mb-2">

                                                            <label for="headdetail">Headdetail</label>
                                                            <input type="text" id="headdetail"
                                                                value="{{$item->headdetail}}" name="headdetail"
                                                                class="form-control mb-2">

                                                            <input type="hidden" name="id" value="{{$item->id}}">
                                                            <input type="submit" name="save" class="btn btn-success"
                                                                value="Save Changes" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="{{route('whyuss.destroy',$item->id)}}" method="POST"
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