<div class="col-12 main-wraper">
    <div class="row offer-caro">
        @foreach ($offers['offers'] as $offer)
            <div class="col-lg-12 deal-col">
            <div class="deal uk-card uk-card-default uk-card-hover uk-card-body" style="background-image: url({{ asset('storage/'.$offer->image)}});">

                <div class="deal-content">
                    <span>{{$offer->updated_at->diffForHumans()}}</span>
                    <p>{{$offer->details}}</p>
                </div>

                <div class="deal-bottom">
                    <div class="deal-countdown daily-deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->
                </div>

            </div>
        </div>
        @endforeach
    </div><!-- End .row -->
    <div class="more-container text-center mt-1 mb-5">
        <a href="{{ route('offer.all') }}" class="main-btn2" style="width: auto"><span>Shop more Offers</span><i class="icofont-arrow-right"></i></a>
    </div><!-- End .more-container -->
</div>
