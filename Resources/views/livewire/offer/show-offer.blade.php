<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="page-contents" class="row merged20">
                        <div class="col-lg-12">
                            <div class="main-wraper">
                                <div class="main-title">Offers</div>
                                <div class="row">
                                    @foreach ($offers['offers'] as $offer)
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="event-post mb-3 ">
                                            <figure><a href="event-detail.html" title=""><img src="{{ asset('storage/'.$offer->image)}}" alt=""></a></figure>
                                            <div class="event-meta">
                                                <span>{{$offer->updated_at->diffForHumans()}}</span>
                                                {{-- <h6><a href="event-detail.html" title="">Exhibition of Music</a></h6> --}}
                                                <p>{{$offer->details}}</p>
                                                <div class="deal-bottom" style="padding: 8px 65px;">
                                                    <div class="deal-countdown daily-deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->
                                                </div><!-- End .deal-bottom -->
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{ $offers['offers']->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <div class="col-lg-6">
    <div class="loadMore">
        @foreach($offers as $offer)
            <div class="central-meta item">
                <div class="user-post">
                    <div class="friend-info ">
                        <div class="post-head">
                            <div class="row">
                                <div class="col-lg-10 col-sm-10 col-xs-10">
                                    <figure>
                                        <img src="{{asset('assets/images/resources/friend-avatar10.jpg')}}" alt="">
                                    </figure>
                                    <div class="friend-name ">
                                        <ins ><a href="#" title="">
                                                @if($offer->type == Modules\UserModule\Enum\OfferEnum::USER)
                                                    {{$offer->user->name}}
                                                @else
                                                    Bialjumla
                                                @endif
                                            </a></ins>
                                        <span class="cat-heading">
                                            Active:
                                            @if($offer->active == 0)
                                                 <img src="{{ asset('assets/images/checkmark.svg') }}"/>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-meta" id="post">
                            <div class="post-details text-center">
                                <ul class="product-gallery">
                                    <li>
                                        <a href="" data-fancybox="gallery">
                                            <img src="{{ asset('storage/'.$offer->image)}}" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="description">
                                <p>
                                    <span class="cat-heading">{{__('start-date')}} :</span> {{$offer->start_date}},
                                    <span class="cat-heading">{{__('end-date')}} :  </span> {{$offer->end_date}} ,
                                </p>
                                <p> {{$offer->details}} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}
