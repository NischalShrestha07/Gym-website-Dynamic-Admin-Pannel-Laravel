@extends('frontend.layouts.main')
@section('main-container')


{{-- </div> --}}
<!-- contact section -->

<section class="contact_section ">
    <div class="container-fluid">
        {{-- @foreach ($contacts as $item) --}}

        <div class="row">
            <div class="col-md-6 px-0">
                <div class="img-box">
                    <img src="{{ asset($contactimage) }}" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="form_container pr-0 pr-lg-5 mr-0 mr-lg-2">
                    <div class="heading_container">
                        <h1>
                            Create New Account
                        </h1>
                    </div>
                    <div class="contact_form">
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            <p>{{session()->get('success')}}</p>
                        </div>

                        @endif
                        @if (session()->has('error'))
                        <div class="alert alert-danger">
                            <p>{{session()->get('error')}}</p>
                        </div>

                        @endif
                        <form action="{{ url('loginUser') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div>
                                <input type="email" name="email" placeholder="Email" required />
                            </div>

                            <div>
                                <input type="password" name="password" placeholder="Password" required />
                            </div>

                            <div class="d-flex ">
                                <button type="submit" class="site-btn" name="login">
                                    Log In
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>
</section>



<!-- info section -->
<section class="info_section layout_padding2">
    <div class="container">
        <div class="info_items">
            @foreach ($footerbars as $item)

            <a href="">
                <div class="item ">
                    <div class="box">
                        <img src="{{ asset('storage/' .$item->pic) }}" alt="">
                    </div>
                    <div class="detail-box">
                        <p>
                            {{$item->name}}
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection