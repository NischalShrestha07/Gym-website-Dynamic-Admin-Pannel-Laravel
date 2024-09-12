@extends('frontend.layouts.main')
@section('main-container')
<style>
    .tcolor h1 {
        color: yellow;
    }
</style>
<section class="slider_section position-relative">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($man as $item)
            <div class="carousel-item active">
                <div class="container">
                    <div class="col-lg-10 col-md-11 mx-auto">
                        <div class="detail-box">
                            <div class="tcolor">
                                <h1>
                                    {{ $title }}
                                </h1>

                                <p>
                                    {{ $description }}
                                </p>
                                <div class="">
                                    {{-- <a href="{{ asset('/contact') }}"> --}}
                                        <a href="{{ asset('/contact') }}">
                                            Contact Us
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="carousel-item">
                <div class="container">
                    <div class="col-lg-10 col-md-11 mx-auto">
                        <div class="detail-box">
                            <div class="tcolor">
                                <h1>
                                    {{ $title }}
                                </h1>
                                <p>
                                    {{ $description }}
                                </p>
                                <div class="cColor">
                                    <a href="/contact">
                                        Contact Us
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>

    </div>
</section>
{{--
<!-- end slider section --> --}}
</div>


<!-- Us section -->

<section class="us_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Why Choose Us
            </h2>
        </div>

        <div class="us_container ">
            <div class="row">
                @foreach ($whyuss as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('storage/' . $item->img) }}" alt="">
                            {{-- <img src="{{ asset($item->img) }}" alt=""> --}}

                        </div>
                        <div class="detail-box">
                            <h5>
                                {{-- QUALITY EQUIPMENT --}}
                                {{ $item->title }}
                            </h5>
                            <p>
                                {{-- ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor --}}
                                {{ $item->description }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

<!-- end us section -->


<!-- heathy section -->

<section class="heathy_section layout_padding">
    <div class="container">

        <div class="row">
            {{-- @foreach ($whyuss as $item) --}}
            <div class="col-md-12 mx-auto">
                <div class="detail-box">
                    <h2>
                        {{-- HEALTHY MIND, HEALTHY BODY --}}
                        {{ $item->head }}
                    </h2>
                    <p>
                        {{ $item->headdetail }}
                        {{-- Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore
                        et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex
                        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillumLorem
                        ipsum
                        dolor
                        sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                        Ut
                        enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum --}}
                    </p>
                    <div class="btn-box">
                        <a href="">
                            READ MORE
                        </a>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>

    </div>
</section>

<!-- end heathy section -->

<!-- trainer section -->

<section class="trainer_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Our Gym Trainers
            </h2>
        </div>
        <div class="row">
            @foreach ($trainers as $item)
            <div class="col-lg-4 col-md-6 mx-auto">
                <div class="box">
                    <div class="name">
                        <h5>
                            {{ $item->name }}
                        </h5>
                    </div>
                    <div class="img-box">
                        <img src="{{ asset('storage/' . $item->photo) }}" alt="">
                    </div>
                    <div class="social_box">
                        <a href="{{ $item->facebook }}">
                            <img src="{{ asset('frontend/images/facebook-logo.png') }} " alt="">
                        </a>
                        <a href="{{ $item->twitter }}">
                            <img src="{{ asset('frontend/images/twitter.png') }}  " alt="">
                        </a>
                        <a href="{{ $item->instagram }}">
                            <img src="{{ asset('frontend/images/instagram-logo.png') }}  " alt="">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-lg-4 col-md-6 mx-auto">
                <div class="box">
                    <div class="name">
                        <h5>
                            {{$name}}
                        </h5>
                    </div>
                    <div class="img-box">
                        <img src="{{ asset('storage/'.$photo) }} " alt="">
                    </div>
                    <div class="social_box">
                        <a href="$facebo0k">
                            <img src="{{ asset('frontend/images/facebook-logo.png') }}" alt="">
                        </a>
                        <a href="$twitter">
                            <img src="{{ asset('frontend/images/twitter.png') }}" alt="">
                        </a>
                        <a href="$instagram">
                            <img src="{{ asset('frontend/images/instagram-logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-lg-4 col-md-6 mx-auto">
                <div class="box">
                    <div class="name">
                        <h5>
                            Alex Den
                        </h5>
                    </div>
                    <div class="img-box">
                        <img src="{{ asset('frontend/images/t3.jpg') }} " alt="">
                    </div>
                    <div class="social_box">
                        <a href="">
                            <img src="{{ asset('frontend/images/facebook-logo.png') }}" alt="">
                        </a>
                        <a href="">
                            <img src="{{ asset('frontend/images/twitter.png') }}" alt="">
                        </a>
                        <a href="">
                            <img src="{{ asset('frontend/images/instagram-logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>

<!-- end trainer section -->

<!-- contact section -->

<section class="contact_section ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 px-0">
                <div class="img-box">



                    <img src="{{ asset($contactimage) }}" width="100px" alt="contact image">



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
    </div>
</section>
<!-- end contact section -->

<!-- info section -->
<section class="info_section layout_padding2">
    <div class="container">
        <div class="info_items">
            @foreach ($footerbars as $item)
            <a href="">
                <div class="item ">
                    <div class="box">
                        <img src="{{ asset('storage/' . $item->pic) }}" alt="">
                    </div>
                    <div class="detail-box">
                        <p>
                            {{ $item->name }}
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
<!-- end info_section -->