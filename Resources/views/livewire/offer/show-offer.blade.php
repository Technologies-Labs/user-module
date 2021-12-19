<div class="main-wraper">
    @php
    use Modules\UserModule\Enum\OfferEnum;
    use Carbon\Carbon;
    @endphp
    <div class="main-title">Offers</div>
    <div class="row">
        @foreach ($offers as $offer)
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="event-post mb-3 ">
                <figure><a href="#" title=""><img
                            src="{{ asset('storage')}}/{{OfferEnum::IMAGE.$offer->image}}"
                            alt=""></a></figure>
                <div class="event-meta">
                    <span>{{$offer->updated_at->diffForHumans()}}</span>
                    {{-- <h6><a href="event-detail.html" title="">Exhibition of Music</a>
                    </h6> --}}
                    <p>{{$offer->details}}</p>
                    <div class="deal-bottom" style="padding: 8px 65px;">
                        <div class="deal-countdown offer-countdown" data-until="+{{Carbon::parse($offer->end_date)->diffInHours(Carbon::now())}}h">
                        </div><!-- End .deal-countdown -->
                    </div><!-- End .deal-bottom -->
                </div>
            </div>
        </div>
        @endforeach

        <div x-data="{
            observe() {
                let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting)
                    {
                        @this.call('loadMore')
                    }
                   })
                },{
                   root: null
                })
                    observer.observe(this.$el)
            }
        }" x-init="observe">

        </div>
        @if($offers->hasMorePages())
        @include('components.loading')
        @endif

    </div>
</div>
