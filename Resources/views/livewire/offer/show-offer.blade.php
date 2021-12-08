<section>
    @php
    use Modules\UserModule\Enum\OfferEnum;
    @endphp
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="page-contents" class="row merged20">
                        <div class="col-lg-12">
                            <div class="main-wraper">
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
                                                    <div class="deal-countdown daily-deal-countdown" data-until="+10h">
                                                    </div><!-- End .deal-countdown -->
                                                </div><!-- End .deal-bottom -->
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div x-data="{
                                        offersObserve() {
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
                                    }" x-init="offersObserve">

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    @if($offers->hasMorePages())
                    @include('components.loading')
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
