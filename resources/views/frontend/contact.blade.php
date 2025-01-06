@extends('frontend.layouts.main')
@section('main-container')


{{-- </div> --}}
<!-- contact section -->
<div>
    @if (session('success'))
    <div class="alert alert-success text-white bg-success alert-dismissible custom-alert" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger text-white bg-danger alert-dismissible custom-alert" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>
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
                        <h2>
                            Contact Us
                        </h2>
                    </div>
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div>
                            <input type="text" name="name" placeholder="Name" required />
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Email" required />
                        </div>
                        <div>
                            <input type="text" name="phoneno" placeholder="Phone Number" required />
                        </div>
                        <div>
                            <input type="text" class="message-box" name="message" placeholder="Message" />
                        </div>
                        <div class="d-flex ">
                            <button type="submit">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>
</section>


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