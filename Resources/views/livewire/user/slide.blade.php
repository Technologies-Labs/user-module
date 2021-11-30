<div class="col-lg-12">
    <div class="main-wraper" >
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="user-post trader">
                    <div class="friend-info">
                        <div class="title area" >
                            <h1 class="uk-heading-line uk-text-center pb-3"><span>Trader</span></h1>
                        </div>
                        <ul class="trader-caro">
                            @foreach($users['users'] as $user)
                                <li>
                                    <figure><img src="{{asset('storage/'.$user->image)}}" alt=""></figure>
                                    <ins><a href="{{ route('user.profile',$user->name) }}">{{$user->name}}</a></ins>
                                    @if($user->id != $currantUser->id)
                                         <livewire:usermodule::follower.follow :user="$user" />
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>

    </div>
</div>
