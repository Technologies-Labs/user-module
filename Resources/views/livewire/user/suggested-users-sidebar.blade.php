<div class="widget stick-widget">
    <h4 class="widget-title">Who's follownig</h4>
    <ul class="followers">
        @foreach ($users as $user)
        <li>
            <figure><img alt="" src="{{ asset('storage') }}/{{$user->image}}">
            </figure>
            <div class="friend-meta">
                <h4>
                    <a title="" href="{{ route('user.profile', ['name'=>$user->name]) }}">{{$user->full_name}}</a>
                    {{-- <span>Dept colleague</span> --}}
                </h4>
                <a class="underline" title="" target="_blank" href="{{ route('user.profile', ['name'=>$user->name]) }}">Show</a>
            </div>
        </li>
        @endforeach

    </ul>
</div>
