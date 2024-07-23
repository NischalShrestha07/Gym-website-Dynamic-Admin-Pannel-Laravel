@extends('frontend.layouts.main')
@section('main-container')
{{-- </div> --}}


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
      {{-- <div class="col-lg-4 col-md-6 mx-auto">
        <div class="box">
          <div class="name">
            <h5>
              Jean Doe
            </h5>
          </div>
          <div class="img-box">
            <img src="{{ asset('frontend/images/t2.jpg') }}" alt="">
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
      </div>
      <div class="col-lg-4 col-md-6 mx-auto">
        <div class="box">
          <div class="name">
            <h5>
              Alex Den
            </h5>
          </div>
          <div class="img-box">
            <img src="{{ asset('frontend/images/t3.jpg') }}" alt="">
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