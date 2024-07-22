@extends('frontend.layouts.main')
@section('main-container')





<section class="info_section layout_padding2">
    <div class="container">
        <div class="info_items">
            @foreach ($footerbars as $item)
            <a href="">
                <div class="item ">
                    <div class="img-box box-1">
                        <img src="{{ asset('storage/'.$item->pic) }}" alt="">
                    </div>
                    <div class="detail-box">
                        <p>
                            {{$item->name}}
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
            {{-- <a href="">
                @foreach ($footerbars as $item)
                <div class="item ">
                    <div class="img-box box-2">
                        <img src="{{ asset('storage/'.$item->pic) }}" alt="">
                    </div>
                    <div class="detail-box">
                        <p>
                            +02 1234567890
                        </p>
                    </div>
                </div>
                @endforeach
            </a> --}}
            {{-- <a href="">
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
            </a> --}}
        </div>
    </div>
</section>
@endsection