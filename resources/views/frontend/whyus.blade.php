@extends('frontend.layouts.main')
@section('main-container')

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
        <div class="col-lg-3 col-md-6">
          @foreach ($whyuss as $item)

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
          @endforeach
        </div>
        {{-- <div class="col-lg-3 col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('frontend/images/u-4.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                NUTRITION
              </h5>
              <p>
                ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('frontend/images/u-2.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                HEALTHY DIET PLAN
              </h5>
              <p>
                ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('frontend/images/u-3.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                SPORT TRAINING
              </h5>
              <p>
                ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              </p>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
</section>

<!-- end us section -->


<!-- info section -->
<section class="info_section layout_padding2">
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
</section>
@endsection
<!-- end info_section -->