<div class="tab-pane fade" id="suggestions" wire:ignore.self>

    <div class="main-wraper">
        <h3 class="main-title">All Suggestion</h3>
        @can('suggestion-list')
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
                        @can('suggestion-delete', Model::class)
                        <i wire:click="deleteSuggestion({{$suggestion->id}})" class="del icofont-close-circled"
                            title="Remove"></i>
                        @endcan

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
        @endcan
    </div>


</div>

