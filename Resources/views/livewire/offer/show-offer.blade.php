<div class="col-lg-6">
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
</div>
