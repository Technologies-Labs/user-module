<div class="searches">
    @php
        use Modules\Product\Enum\ProductEnum;
    @endphp
    <form method="post" wire:submit.prevent="getSearch()">
        <input wire:model.defer='search' type="text" placeholder="Search...">
        <button type="submit"><i class="icofont-search"></i></button>
        <span class="cancel-search"><i class="icofont-close"></i></span>
        <div style="position: absolute; top: 10px;right: 20px" >
            <span wire:click="$set('type', 'product')" class="button small @if ($type == 'product') dark transition-3d-hover @else outline-light  @endif" style="cursor: pointer;">Product</span>
            @include('components.loading')
            <span wire:click="$set('type', 'user')" class="button small @if ($type == 'user') dark transition-3d-hover @else outline-light @endif" style="cursor: pointer;">User</span>
        </div>
        <div class="recent-search" wire:ignore.self>
            <h4 class="recent-searches">Your's Recent Search</h4>
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

                @foreach ($products as $product)
                <a href="{{ route('show.product', ['product'=>$product->id]) }}" target="_blank">
                    <div class="searched-user">
                        <figure><img src="{{ asset('storage') }}/{{ProductEnum::IMAGE.$product->image}}" alt=""></figure>
                        <span><b style="font-size: 15px">{{$product->name}}</b></span>
                    </div>
                </a>
                @endforeach

            </ul>
        </div>
    </form>
</div>
