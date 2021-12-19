<div class="gap no-gap">
    <div class="top-area mate-black low-opacity">
        <div class="bg-image" style="background-image: url({{asset('images/resources/top-bg.jpg')}})"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post-subject">
                        <div class="university-tag">
                            <figure>
                                <img src="{{ asset('storage') }}/{{$user->image}}" alt="">
                                <!-- <form class="edit-phto">
                                <i class="far fa-edit"></i>
                                <label class="fileContainer">
                                    Edit
                                    <input type="file">
                                </label>
                            </form> -->
                            </figure>
                            <div class="uni-name">
                                <h4>{{$user->full_name}}</h4>
                                <span>{{'@'.$user->name}}</span>
                            </div>
                            <!-- <ul class="sharing-options">
                            <li><a title="Invite Colleagues" href="#" data-toggle="tooltip"><i class="icofont-id-card"></i></a> </li>
                            <li><a title="Follow" href="#" data-toggle="tooltip"><i class="icofont-star"></i></a> </li>
                            <li><a title="Share" href="#" data-toggle="tooltip"><i class="icofont-share-alt"></i></a> </li>
                        </ul> -->
                            @if(!$isCurrantUser)
                                @include('usermodule::website.profile.components.actions')
                            @endif

                        </div>

                        @include('usermodule::website.profile.components.profile_header')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div>
    <section>
        <div class="feature-photo">
            <figure>
                @if(!$logo)
                <img src="{{asset('assets/images/resources/timeline-1.jpg')}}" alt="">
                @else
                <img src="{{ asset($logo)}}" alt="">
                @endif
            </figure>
            <div class="add-btn">
                @if(!$isCurrantUser)
                @include('usermodule::components.user_profile.actions')
                <livewire:usermodule::suggestion.user-suggestion :user="$user" />
                <livewire:usermodule::announcement.user-announcement :user="$user" />
                @endif
            </div>
            @if($isCurrantUser)
            @include('usermodule::components.user_profile.edit_cover_photo')
            @endif

            <div class="container-fluid">
                <div class="row merged">
                    <div class="col-lg-2 col-sm-3">
                        @include('usermodule::components.user_profile.user_avatar')
                    </div>
                    <div class="col-lg-10 col-sm-9">
                        <div class="timeline-info">
                            <ul>
                                <li>
                                    <a class="active" href="time-line.html" title="" data-ripple="">time line</a>
                                    <a class="" href="timeline-photos.html" title="" data-ripple="">Photos</a>
                                    <a class="" href="timeline-videos.html" title="" data-ripple="">Videos</a>
                                    <a class="" href="timeline-friends.html" title="" data-ripple="">Friends</a>
                                    <a class="" href="timeline-groups.html" title="" data-ripple="">Groups</a>
                                    <a class="" href="services.html" title="" data-ripple="">Services</a>
                                    <a class="" href="about.html" title="" data-ripple="">about</a>
                                    @if($isCurrantUser)
                                    @include('usermodule::components.suggestion.show-user-suggestions')
                                    @endif
                                    <a class="" href="#" title="" data-ripple="">more</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- top area -->
</div> --}}
