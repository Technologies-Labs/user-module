@extends('layouts.simple.master')

@push('css_middle')
<link rel="stylesheet" href="{{ asset('css/lightbox.html') }}">
@endpush

@push('scripts_before')
<script src="{{ asset('js/uikit.min.js') }}"></script>
@endpush

@section('content')

<livewire:usermodule::user-profile :user="$user" />

<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="page-contents" class="row merged20">
                        <div class="col-lg-3">
                            <aside class="sidebar static right">
                                <div class="widget  stick-widget">
                                    <h4 class="widget-title">Complete Your Profile</h4>
                                    <span>Your Profile is missing followings!</span>
                                    <div data-progress="tip" class="progress__outer" data-value="0.67">
                                        <div class="progress__inner">82%</div>
                                    </div>
                                    <ul class="prof-complete">
                                        <li><i class="icofont-plus-square"></i> <a href="#" title="">Upload Your
                                                Picture</a><em>10%</em></li>
                                        <li><i class="icofont-plus-square"></i> <a href="#" title="">Your
                                                University?</a><em>20%</em></li>
                                        <li><i class="icofont-plus-square"></i> <a href="#" title="">Add Payment
                                                Method</a><em>20%</em></li>
                                    </ul>
                                </div><!-- complete profile widget -->
                            </aside>
                        </div>
                        <div class="col-lg-6">
                            <div class="tab-content">

                                {{-- timeline --}}
                                <div class="tab-pane fade active show" id="timeline" wire:ignore.self>
                                    <div class="main-wraper">
                                        <span class="new-title">Create New Post</span>
                                        <div class="new-post">
                                            <form method="post">
                                                <i class="icofont-pen-alt-1"></i>
                                                <input type="text" placeholder="Create New Post">
                                            </form>
                                            <ul class="upload-media">
                                                <li>
                                                    <i><img src="{{ asset('images/image.png') }}" alt=""></i>
                                                    <span>Photo/Video</span>
                                                </li>
                                                <li>
                                                    <i><img src="{{ asset('images/file.png') }}" alt=""
                                                            style="width: 22px;"></i>
                                                    <span>File</span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div><!-- create new post -->
                                    <div class="main-wraper">
                                        <div class="user-post">
                                            <div class="friend-info">
                                                <figure>
                                                    <em>
                                                        <svg style="vertical-align: middle;"
                                                            xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                            viewBox="0 0 24 24">
                                                            <path fill="#7fba00" stroke="#7fba00"
                                                                d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                                                            </path>
                                                        </svg></em>
                                                    <img alt="" src="{{ asset('images/resources/user5.jpg') }}">
                                                </figure>
                                                <div class="friend-name">
                                                    <div class="more">
                                                        <div class="more-post-optns">
                                                            <i class="">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-more-horizontal">
                                                                    <circle cx="12" cy="12" r="1"></circle>
                                                                    <circle cx="19" cy="12" r="1"></circle>
                                                                    <circle cx="5" cy="12" r="1"></circle>
                                                                </svg></i>
                                                            <ul>
                                                                <li>
                                                                    <i class="icofont-pen-alt-1"></i>Edit Post
                                                                    <span>Edit This Post within a Hour</span>
                                                                </li>
                                                                <li>
                                                                    <i class="icofont-ban"></i>Hide Post
                                                                    <span>Hide This Post</span>
                                                                </li>
                                                                <li>
                                                                    <i class="icofont-ui-delete"></i>Delete Post
                                                                    <span>If inappropriate Post By
                                                                        Mistake</span>
                                                                </li>
                                                                <li>
                                                                    <i class="icofont-flag"></i>Report
                                                                    <span>Inappropriate content</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ins><a title="" href="time-line.html">Andrew Jhon</a></ins>
                                                    <span><i class="icofont-globe"></i> published: Sep,15
                                                        2020</span>
                                                </div>
                                                <div class="post-meta">
                                                    <figure id="main">
                                                        <img src="{{ asset('images/resources/laptop.png') }}" alt="">
                                                    </figure>
                                                    <a href="https://themeforest.net/item/winku-social-network-toolkit-responsive-template/22363538"
                                                        class="post-title" target="_blank">Winku Social Network
                                                        with Company Pages Theme</a>
                                                    <div>
                                                        <p class="details">
                                                            “Winku” is a social community mobile app kit with
                                                            features. user can use this app for sharing blog,
                                                            posts, timeline, create Group, Create Pages,
                                                            chat/Messages, Movies sharing, QA, and Much More.
                                                        </p>
                                                    </div>
                                                    <p class="product-single__price" style="margin-bottom: 9px;">
                                                        <s class="old-price">
                                                            <span>$600.00</span>
                                                        </s>
                                                        <span class="new-price">
                                                            <span>$500.00</span>
                                                        </span>
                                                        <span class="discount">
                                                            <span>|</span>&nbsp;
                                                            <span class="off">(<span>16</span>%)</span>
                                                        </span>
                                                    </p>
                                                    <div class="we-video-info">
                                                        <div class="stat-tools" style="width: auto;">
                                                            <a title="" href="#"><i class="icofont-heart"></i></a>
                                                            <!-- <a title="" href="#"><i class="icofont-shopping-cart mr-2"></i>Add to cart</a> -->
                                                            <a title="" href="#" class="comment-to"><i
                                                                    class="icofont-comment"></i> Comment</a>
                                                            <a title="" href="#" class="share-to"><i
                                                                    class="icofont-share-alt"></i> Share</a>
                                                            <div class="new-comment" style="display: none;">
                                                                <form method="post">
                                                                    <input type="text" placeholder="write comment">
                                                                    <button type="submit"><i
                                                                            class="icofont-paper-plane"></i></button>
                                                                </form>
                                                                <div class="comments-area">
                                                                    <ul>
                                                                        <li>
                                                                            <figure><img alt=""
                                                                                    src="{{ asset('images/resources/user1.jpg') }}">
                                                                            </figure>
                                                                            <div class="commenter">
                                                                                <h5><a title="" href="#">Jack
                                                                                        Carter</a></h5>
                                                                                <span>2 hours ago</span>
                                                                                <p>
                                                                                    i think that some how, we
                                                                                    learn who we really are and
                                                                                    then live with that
                                                                                    decision, great post!
                                                                                </p>
                                                                                <span>you can view the more
                                                                                    detail via link</span>
                                                                                <a title=""
                                                                                    href="#">https://www.youtube.com/watch?v=HpZgwHU1GcI</a>
                                                                            </div>
                                                                            <a title="Like" href="#"><i
                                                                                    class="icofont-heart"></i></a>
                                                                            <a title="Reply" href="#"
                                                                                class="reply-coment"><i
                                                                                    class="icofont-reply"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <figure><img alt=""
                                                                                    src="{{ asset('images/resources/user2.jpg') }}">
                                                                            </figure>
                                                                            <div class="commenter">
                                                                                <h5><a title="" href="#">Ching
                                                                                        xang</a></h5>
                                                                                <span>2 hours ago</span>
                                                                                <p>
                                                                                    i think that some how, we
                                                                                    learn who we really are and
                                                                                    then live with that
                                                                                    decision, great post!
                                                                                </p>
                                                                            </div>
                                                                            <a title="Like" href="#"><i
                                                                                    class="icofont-heart"></i></a>
                                                                            <a title="Reply" href="#"
                                                                                class="reply-coment"><i
                                                                                    class="icofont-reply"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="product-detail.html" title="" class="reply"
                                                            style="margin-top: 20px;">Read more <i
                                                                class="icofont-arrow-right"></i></a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div><!-- share link -->
                                    <div class="sp sp-bars"></div>
                                </div>

                                {{-- Groups --}}
                                @if ($isCurrantUser)
                                <livewire:groupmodule::group.user-groups :user="$user" :isCurrantUser="$isCurrantUser" />
                                @endif
                                {{-- Offers --}}
                                <livewire:usermodule::offer.user-offer :user="$user" :isCurrantUser="$isCurrantUser" />

                                {{-- Information --}}
                                <livewire:usermodule::company.user-contact-us :user="$user"
                                    :isCurrantUser="$isCurrantUser" />

                                {{-- Suggestion --}}
                                @if($isCurrantUser)
                                <livewire:usermodule::suggestion.show-user-suggestions :user="$user" />
                                @endif

                                {{-- About --}}
                                <div class="tab-pane fade " id="company" wire:ignore.self>
                                    <livewire:usermodule::company.company-banner :user='$user' :isCurrantUser='$isCurrantUser'  />
                                    <livewire:usermodule::company.company-services :user='$user' :isCurrantUser='$isCurrantUser'  />
                                    <livewire:usermodule::company.company-statistics :user="$user" :isCurrantUser="$isCurrantUser">
                                        <livewire:usermodule::company.company-customer-say :user="$user" :isCurrantUser="$isCurrantUser" />
                                </div>



                            </div>
                        </div>
                        <div class="col-lg-3">
                            <aside class="sidebar static right">
                                <div class="widget stick-widget">
                                    <h4 class="widget-title">Socials</h4>
                                    <ul class="socials">
                                        <li class="facebook">
                                            <i class="icofont-facebook"></i><a href="#" title=""><span>4.5k</span>
                                                Likes</a>
                                        </li>
                                        <li class="twitter">
                                            <i class="icofont-twitter"></i><a href="#" title=""><span>2.3M</span>
                                                Followers</a>
                                        </li>
                                        <li class="google">
                                            <i class="icofont-instagram"></i><a href="#" title=""><span>8.2M</span>
                                                Followers</a>
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('popups')
@if(!$isCurrantUser)
<livewire:usermodule::suggestion.user-suggestion :user="$user" />
<livewire:usermodule::announcement.user-announcement :user="$user" />
@endif


@include('components.popups')
@endsection
