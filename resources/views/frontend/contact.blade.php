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