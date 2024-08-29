@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Settings & Customization</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Settings & Customization</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">General Settings</h5>
                                <form>
                                    <div class="form-group">
                                        <label for="siteName">Gym Name</label>
                                        <input type="text" class="form-control" id="siteName" value="Royal Power Gym">
                                    </div>
                                    <div class="form-group">
                                        <label for="siteEmail">Email</label>
                                        <input type="email" class="form-control" id="siteEmail"
                                            value="admin@royalgym.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="sitePhone">Phone</label>
                                        <input type="text" class="form-control" id="sitePhone" value="+977 123456789">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Theme Customization</h5>
                                <form>
                                    <div class="form-group">
                                        <label for="themeColor">Theme Color</label>
                                        <input type="color" class="form-control" id="themeColor" value="#007bff">
                                    </div>
                                    <div class="form-group">
                                        <label for="logoUpload">Upload Logo</label>
                                        <input type="file" class="form-control-file" id="logoUpload">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
