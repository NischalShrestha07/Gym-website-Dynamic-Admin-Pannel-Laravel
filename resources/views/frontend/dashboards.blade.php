@extends('frontend.layouts.main')
@section('main-container')
{{-- </div> --}}

<style>
    .welcome_section {
        text-align: center;
        background: lightblue;
        padding: 60px 0;
    }

    .welcome_section .heading_container h2 {
        font-size: 36px;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
    }

    .welcome_section .heading_container p {
        font-size: 18px;
        color: #666;
        max-width: 800px;
        margin: 20px auto 40px;
        /* Add top margin of 20px to create equal gap */
    }

    .welcome_section .line-break {
        font-size: 18px;
        color: #333;
        margin: 20px 0;
    }
</style>

<!-- Welcome message section -->
<section class="welcome_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                WELCOME TO NEOGYM FITNESS!
            </h2>
            <p>
                We are thrilled to have you here. Our gym is equipped with state-of-the-art facilities and our
                well-qualified trainers are here to help you achieve your fitness goals. Let's get started on this
                exciting journey together!
            </p>
        </div>
    </div>
</section>
<!-- End welcome message section -->

<!-- trainer section -->
<section class="trainer_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Our Well-Qualified Gym Trainers
            </h2>
        </div>
        <div class="row">
            @foreach ($trainers as $item)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="box">

                    <div class="name">
                        <h5>
                            {{$item->name}}
                        </h5>
                    </div>

                    <div class="img-box">
                        <img src="{{ asset('storage/'.$item->photo) }}" alt="">
                    </div>
                    <div class="social_box">
                        <a href="{{$item->facebook}}">
                            <img src="{{ asset('frontend/images/facebook-logo.png') }}" alt="">
                        </a>
                        <a href="{{$item->twitter}}">
                            <img src="{{ asset('frontend/images/twitter.png') }}" alt="">
                        </a>
                        <a href="{{$item->instagram}}">
                            <img src="{{ asset('frontend/images/instagram-logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<section class="us_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                FACILITIES WE PROVIDE
            </h2>
        </div>

        <div class="us_container ">
            <div class="row">
                @foreach ($whyuss as $item)
                <div class="col-lg-3 col-md-6">

                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('storage/'.$item->img) }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$item->title}}
                            </h5>
                            <p>
                                {{$item->description}}
                                {{-- ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor --}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
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
                    <form action="">
                        <div>
                            <input type="text" placeholder="Name" />
                        </div>
                        <div>
                            <input type="email" placeholder="Email" />
                        </div>
                        <div>
                            <input type="text" placeholder="Phone Number" />
                        </div>
                        <div>
                            <input type="text" class="message-box" placeholder="Message" />
                        </div>
                        <div class="d-flex ">
                            <button>
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
<!-- end us section -->
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