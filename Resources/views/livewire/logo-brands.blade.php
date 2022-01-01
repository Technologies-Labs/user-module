<section class="logo-brand" style="background: whitesmoke">
    <div class="col-lg-12">
        <ul class="brand-caro row">
           @foreach ($logos as $logo)
                <li><img src="{{ asset('storage') }}/{{$logo->image}}" alt=""></li>
            @endforeach

        </ul>
    </div>
</section>
