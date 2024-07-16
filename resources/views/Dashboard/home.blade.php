{{-- New One --}}
<x-adminheader />

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        {{-- removed the unnecessary stuffs --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="display-1 card-title mb-5 ">Change Home Page</p>

                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>HomeImage</th>
                                        <th>Description</th>
                                        <th>ContactImage</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($homes as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td><img src="{{ url('uploads/homes/'.$item->HomeImage) }}" width="100px"
                                                alt=""></td>
                                        <td>{{ $item->Description }}</td>
                                        <td><img src="{{ url('uploads/homes/'.$item->ContactImage) }}" width="100px"
                                                alt=""></td>
                                        <td class="font-weight-medium">
                                            <!-- Button to Open the Modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#updateModal{{ $item->id }}">
                                                Update
                                            </button>

                                            <!-- The Modal -->
                                            <div class="modal" id="updateModal{{ $item->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Update {{ $item->title }}</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal Body -->
                                                        <div class="modal-body">
                                                            <form action="{{ route('homes.update', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="form-group">
                                                                    <label for="title">Title:</label>
                                                                    <input type="text" class="form-control" id="title"
                                                                        name="title" value="{{ $item->title }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="HomeImage">Home Image:</label>
                                                                    <input type="file" class="form-control-file"
                                                                        id="HomeImage" name="HomeImage">
                                                                    @if ($item->HomeImage)
                                                                    <img src="{{ url('uploads/homes/'.$item->HomeImage) }}"
                                                                        width="100px" alt="">
                                                                    @endif
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="Description">Description:</label>
                                                                    <textarea class="form-control" id="Description"
                                                                        name="Description">{{ $item->Description }}</textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="ContactImage">Contact Image:</label>
                                                                    <input type="file" class="form-control-file"
                                                                        id="ContactImage" name="ContactImage">
                                                                    @if ($item->ContactImage)
                                                                    <img src="{{ url('uploads/homes/'.$item->ContactImage) }}"
                                                                        width="100px" alt="">
                                                                    @endif
                                                                </div>

                                                                <!-- Modal Footer -->
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        Changes</button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
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
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->