@extends('frontend.layouts.main')
@section('main-container')
<style>
    .tcolor h1 {
        color: yellow;
    }

    .custom-alert {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050;
        min-width: 300px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }
</style>
<!-- Success and Error Alert Messages -->
{{-- <div>
    @if (session('success'))
    <div class="alert alert-success text-white bg-success alert-dismissible custom-alert fade-in" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger text-white bg-danger alert-dismissible custom-alert fade-in" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div> --}}
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
            // Automatically hide alert after 5 seconds
            setTimeout(() => {
                const alert = document.querySelector('.custom-alert');
                if (alert) {
                    alert.classList.add('fade-out');
                    setTimeout(() => alert.remove(), 500); // Remove element after fade-out
                }
            }, 5000); // Adjust time (5000ms = 5 seconds)
        });
</script>

<style>
    /* Fade-out effect for the alert */
    .fade-out {
        opacity: 0;
        transition: opacity 0.5s ease;
    }
</style>
@endsection
<!-- end info_section -->