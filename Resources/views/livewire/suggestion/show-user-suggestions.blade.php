<div class="tab-pane fade" id="suggestions" wire:ignore.self>
    <div class="main-wraper">
        <h3 class="main-title">All Suggestion</h3>

        <div class="editing-interest">
            <div class="notification-box">
                <ul class="uk-list-divider uk-list-large uk-accordion" uk-accordion="">
                    @foreach ($suggestions as $suggestion)
                    <li>
                        <a class="uk-accordion-title" href="#">
                            <figure><img src="{{ asset('storage/')}}/{{$suggestion->userSuggestion->image}}" alt="">
                            </figure>
                            <div class="notifi-meta">
                                <p>{{$suggestion->userSuggestion->name}}</p>
                                <span><i class="fa fa-comment"></i> {{$suggestion->created_at->diffForHumans()}}</span>
                            </div>
                        </a>
                        {{-- :wire:key="{{$suggestion->id}}" --}}
                        <i wire:click="deleteSuggestion({{$suggestion->id}})" class="del icofont-close-circled"
                            title="Remove"></i>
                        <div class="uk-accordion-content" hidden="" aria-hidden="true">
                            <p>{{$suggestion->details}}</p>
                            @empty(!$suggestion->file)
                            @if (preg_match('/(\.jpg|\.png|\.jpeg)$/', $suggestion->file))
                            <div wire:click="downloadsDoc({{$suggestion}})" class="">
                                <figure class="research-avatar" style="max-width: 20%">
                                    <a class="uk-inline" href="{{ asset('storage/'.$suggestion->file)}}"
                                        data-fancybox="">
                                        <img src="{{ asset('storage/'.$suggestion->file)}}" style="border-radius: 0"
                                            alt="">
                                    </a>
                                </figure>
                            </div>

                            @else
                            <span wire:click="downloadsDoc({{$suggestion}})" class="iconbox button danger"
                                style="cursor: pointer">
                                <i class="icofont-file-alt"></i>
                            </span>
                            @endif
                            @endempty

                        </div>
                    </li>
                    @endforeach

                    <div x-data="{
                        suggestionsObserve() {
                            let observer = new IntersectionObserver((entries) => {
                            console.log(entries)
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
                    }" x-init="suggestionsObserve">

                    </div>
                </ul>
            </div>
            @include('components.loading')
        </div>
    </div>
</div>

{{-- <div class="col-lg-6">
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
                        <i class="del fa fa-close" wire:click="deleteSuggestion({{$suggestion->id}})"></i>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div> --}}
