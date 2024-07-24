@extends('frontend.layouts.main')
@section('main-container')
{{-- </div> --}}

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