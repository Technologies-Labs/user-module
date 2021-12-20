@extends('layouts.simple.master')

@section('content')
<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="page-contents" class="row merged20">
                        <div class="col-lg-8">
                            @livewire('notification::user-notifications', ['user' => Auth::user() , 'page' => 'all-notifications'])
                        </div>
                        <div class="col-lg-4">
                            <aside class="sidebar static right">
                                <livewire:user::suggestion.site-suggestion :template="'widget'" />

                                @livewire('advertisement::position-advertisements', ['position' => Modules\Advertisement\Enum\AdvertisementPositionEnum::SIDEBAR])

                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection




