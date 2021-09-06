<div>
    @include('usermodule::components.offer.create-offer')
    @foreach($userOffer as $offer)
        <div class="loadMore">
            <div>
                <div class="central-meta item" >
                    <div class="user-post">
                        <div class="friend-info ">
                            <div class="post-head">
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-xs-10">
                                        <figure><img src="{{asset('assets/images/resources/user-avatar.jpg')}}" alt=""></figure>
                                        <div class="friend-name ">
                                            <ins ><a href="" title=""> {{$currentUser->name}} </a></ins>
                                            <span>{{__('published')}}: {{$offer->created_at}} </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2  col-sm-2 col-xs-2">
                                        @include('usermodule::components.offer.update-offer')
                                        <span style="float: right;"><a wire:click="deleteOffer({{$offer->id}})"><i class="fa fa-trash"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="post-meta" id="post">
                                <div class="post-details text-center">
                                    <ul class="product-gallery">
                                        <li><img src="{{ asset('storage/'.$offer->image)}}" alt=""></li>
                                    </ul>
                                </div>
                                <div class="description"><p> {{$offer->details}} </p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
