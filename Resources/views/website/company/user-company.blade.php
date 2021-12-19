@extends('layouts.simple.master')

@push('scripts_middle')
<script src="{{ asset('js/counterup.min.js') }}"></script>
<script src="{{ asset('js/counterup-t-waypoint.js') }}"></script>
<script src="{{ asset('js/typed.js') }}"></script>
@endpush

@section('content')
<section>
    <div class="gap overlap nogap mate-black low-opacity">
        <div class="bg-image" style="background-image: url( {{asset('images/resources/slider3.jpg')}})"></div>
        <div class="feature-meta">
            <h1>{{$banner->banner_title}}</h1>
            <h3>{{$banner->banner_description}}</h3>
        </div>
    </div>
</section>

<section>
    <div class="gap no-bottom grey-bg nogap">
        <div class="container">
            <div class="row">
                @foreach ($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="info-sec">
                        <i class="icofont-checked"></i>
                        <div>
                            <h6>{{$service->name}}</h6>
                            <p>{{$service->description}}.</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

<section>
    <div class="gap no-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-full">
                        <div class="row">
                            @foreach ($statistics as $statistic)
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="funfact-counter">
                                    <i class="icofont-air-ticket"></i>
                                    <span class="counter">{{$statistic->count}}</span>
                                    <em>{{$statistic->name}}</em>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- funfacts -->



<section>
    <div class="gap no-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title">
                        <h1>What our Students Have Today!</h1>
                        <p>Our Researchers have today now?</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="student-review">
                        @foreach ($customerSays as $customerSay)
                        <div class="review-item">
                            <figure><img src="{{ asset('storage/'.$customerSay->customer_image) }}" alt=""></figure>
                            <h6>{{$customerSay->customer_name}}</h6>
                            <p>{{$customerSay->customer_say}}</p>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
