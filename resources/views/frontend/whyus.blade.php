@extends('frontend.layouts.main')
@section('main-container')

{{-- </div> --}}


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

<!-- info section -->
{{-- <section class="info_section layout_padding2">
  <div class="container">
    <div class="info_items">
      <a href="">
        <div class="item ">
          <div class="img-box box-1">
            <img src="" alt="">
          </div>
          <div class="detail-box">
            <p>
              Location
            </p>
          </div>
        </div>
      </a>
      <a href="">
        <div class="item ">
          <div class="img-box box-2">
            <img src="" alt="">
          </div>
          <div class="detail-box">
            <p>
              +02 1234567890
            </p>
          </div>
        </div>
      </a>
      <a href="">
        <div class="item ">
          <div class="img-box box-3">
            <img src="" alt="">
          </div>
          <div class="detail-box">
            <p>
              demo@gmail.com
            </p>
          </div>
        </div>
      </a>
    </div>
  </div>
</section> --}}

<!-- end info_section -->