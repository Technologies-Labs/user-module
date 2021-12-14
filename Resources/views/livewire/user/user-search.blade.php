<div class="searches" >
    <form method="post">
        <input wire:model.debounce.900ms='user' type="text" placeholder="بحث ..">
        <button type="#"><i class="icofont-search"></i></button>
        <span class="cancel-search"><i class="icofont-close"></i></span>
        <div class="recent-search" wire:ignore.self>
            <h4 class="recent-searches">اخر ماتم البحث عنه</h4>
            <ul class="so-history">
                @include('components.loading')
                @foreach ($users as $user)
                <a href="{{ route('user.profile', ['name'=>$user->name]) }}" target="_blank">
                    <div class="searched-user">
                        <figure><img src="{{ asset('storage') }}/{{$user->image}}" alt=""></figure>
                        <span><b style="font-size: 15px">{{'@'.$user->name}}</b> {{$user->full_name}}</span>
                    </div>
                </a>
                @endforeach

            </ul>
        </div>
    </form>

</div>
