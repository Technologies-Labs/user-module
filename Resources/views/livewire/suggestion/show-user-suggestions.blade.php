<div class="col-lg-6">
    <div class="central-meta">
        <div class="editing-interest">
            <h5 class="f-title">{{__('all-suggestions')}}</h5>
            <div class="notification-box">
                <ul class="suggestion">
                    @foreach ($suggestions as $suggestion)
                        <li>
                            <figure><img src="{{asset('assets/images/resources/user-avatar.jpg')}}" alt=""></figure>
                            <div class="notifi-meta">
                                <a>{{$suggestion->userSuggestion->name}}</a>
                                <p>{{$suggestion->details}}</p>
                                <img src="{{ asset('storage/'.$suggestion->file)}}" alt="">
                            </div>
                            <i class="del fa fa-close" wire:click ="deleteSuggestion({{$suggestion->id}})" ></i>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
