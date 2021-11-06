<div class="tab-pane fade" id="Offers" wire:ignore.self>
    @if ($isCurrantUser)
    @include('usermodule::website.offer.components.create_offer')
    @endif


    @foreach ($userOffer as $offer)
    <div class="main-wraper">
        <div class="user-post">
            <div class="friend-info">
                <figure>
                    <em>
                        <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                            viewBox="0 0 24 24">
                            <path fill="#7fba00" stroke="#7fba00"
                                d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                            </path>
                        </svg></em>
                    <img alt="" src="{{ asset('') }}{{$user->image}}">
                </figure>

                <div class="friend-name">
                    @if ($isCurrantUser)
                    <div class="more">
                        <div class="more-post-optns">
                            <i class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg></i>
                            <ul>
                                <li class="add-offer" wire:click="editUserOffer({{$offer->id}})">
                                    <i class="icofont-pen-alt-1"></i>Edit Post
                                    <span>Edit This Post within a Hour</span>
                                </li>
                                <li wire:click="deleteOffer({{$offer->id}})">
                                    <i class="icofont-ui-delete"></i>Delete Post
                                    <span>If inappropriate Post By Mistake</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif


                    <ins><a title="" href="time-line.html">{{$user->name}}</a></ins>
                    <span><i class="icofont-globe"></i> published: {{$offer->created_at->diffForHumans()}} </span>
                </div>
                <div class="post-meta">
                    <figure id="main">
                        <img src="{{ asset('storage/'.$offer->image)}}" alt="">
                    </figure>
                    {{-- <a
                        href="https://themeforest.net/item/winku-social-network-toolkit-responsive-template/22363538"
                        class="post-title" target="_blank">Winku Social Network
                        with Company Pages Theme</a> --}}
                    <div>
                        <p class="details">
                            {{$offer->details}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endforeach
    @if ($isCurrantUser)
    @include('usermodule::website.offer.modals.offer-modal')
    @endif


</div>






{{-- <div>
    @include('usermodule::components.offer.create-offer')
    @foreach($userOffer as $offer)
    <div class="loadMore">
        <div>
            <div class="central-meta item">
                <div class="user-post">
                    <div class="friend-info ">
                        <div class="post-head">
                            <div class="row">
                                <div class="col-lg-10 col-sm-10 col-xs-10">
                                    <figure><img src="{{asset('assets/images/resources/user-avatar.jpg')}}" alt="">
                                    </figure>
                                    <div class="friend-name ">
                                        <ins><a href="" title=""> {{$currentUser->name}} </a></ins>
                                        <span>{{__('published')}}: {{$offer->created_at}} </span>
                                    </div>
                                </div>
                                <div class="col-lg-2  col-sm-2 col-xs-2">
                                    @include('usermodule::components.offer.update-offer')
                                    <span style="float: right;"><a wire:click="deleteOffer({{$offer->id}})"><i
                                                class="fa fa-trash"></i></a></span>
                                </div>
                            </div>
                        </div>
                        <div class="post-meta" id="post">
                            <div class="post-details text-center">
                                <ul class="product-gallery">
                                    <li><img src="{{ asset('storage/'.$offer->image)}}" alt=""></li>
                                </ul>
                            </div>
                            <div class="description">
                                <p> {{$offer->details}} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div> --}}
