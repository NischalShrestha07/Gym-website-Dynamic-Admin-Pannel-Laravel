@extends('frontend.layouts.main')
@section('main-container')


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
                            <img src="{{ asset('storage/'.$item->img) }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$item->title}}
                            </h5>
                            <p>
                                {{$item->description}}
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