<div class="main-wraper">
    <div class="user-post">
        <div class="friend-info">
            <figure>
                <i class="icofont-learn"></i>
            </figure>
            <div class="friend-name">
                <ins><a title="" href="time-line.html">Suggested</a></ins>
                <span><i class="icofont-runner-alt-1"></i> Follow similar Research People</span>
            </div>
            <ul class="suggested-caro">
                @foreach ($users as $user)
                <li>
                    <figure><img src="{{ asset('storage') }}/{{$user->image}}" alt=""></figure>
                    <span>{{$user->full_name}}</span>
                    {{-- <ins>Department of Socilolgy</ins> --}}
                    <a href="{{ route('user.profile', ['name'=>$user->name]) }}" title="" data-ripple=""><i class="icofont-star"></i> Show</a>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</div><!-- suggested friends -->
