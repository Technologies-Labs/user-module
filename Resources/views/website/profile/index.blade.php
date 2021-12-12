@extends('layouts.simple.master')

@push('css_middle')
<link rel="stylesheet" href="{{ asset('css/lightbox.html') }}">
@endpush

@push('scripts_before')
<script src="{{ asset('js/uikit.min.js') }}"></script>
@endpush

@section('content')

<livewire:usermodule::user-profile :user="$user" />

<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="page-contents" class="row merged20">
                        <div class="col-lg-3">
                            <aside class="sidebar static right">
                                @livewire('usermodule::user.complete-profile', ['user' => $user])

                                @livewire('advertisementmodule::position-advertisements', ['position' => Modules\AdvertisementModule\Enum\AdvertisementPositionEnum::SIDEBAR])
                            </aside>
                        </div>

                        <div class="col-lg-6">
                            <div class="tab-content">

                                {{-- timeline --}}
                                <livewire:productmodule::product-list :user="$user" :isCurrantUser="$isCurrantUser" />


                                {{-- Groups --}}
                                @if ($isCurrantUser)
                                <livewire:groupmodule::group.user-groups :user="$user" :isCurrantUser="$isCurrantUser" />
                                @endif

                                {{-- Offers --}}
                                <div class="tab-pane fade" id="Offers" wire:ignore.self>
                                    <livewire:usermodule::offer.user-offer :user="$user" :isCurrantUser="$isCurrantUser" />
                                </div>



                                {{-- Information --}}
                                <livewire:usermodule::company.user-contact-us :user="$user" :isCurrantUser="$isCurrantUser" />

                                {{-- Suggestion --}}
                                @if($isCurrantUser)
                                <livewire:usermodule::suggestion.show-user-suggestions :user="$user" />
                                @endif

                                {{-- About --}}
                                @if($isCurrantUser)
                                <div class="tab-pane fade " id="company" wire:ignore.self>
                                    <livewire:usermodule::company.company-banner :user="$user" :isCurrantUser='$isCurrantUser'  />
                                    <livewire:usermodule::company.company-services :user="$user" :isCurrantUser='$isCurrantUser'  />
                                    <livewire:usermodule::company.company-statistics :user="$user" :isCurrantUser="$isCurrantUser">
                                    <livewire:usermodule::company.company-customer-say :user="$user" :isCurrantUser="$isCurrantUser" />
                                </div>
                                @endif



                            </div>
                        </div>

                        <div class="col-lg-3">
                            <aside class="sidebar static right">
                                <livewire:usermodule::suggestion.site-suggestion :template="'widget'" />
                                @livewire('advertisementmodule::position-advertisements', ['position' => Modules\AdvertisementModule\Enum\AdvertisementPositionEnum::SIDEBAR])
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('popups')
@if(!$isCurrantUser)

@can('suggestion-create')
<livewire:usermodule::suggestion.user-suggestion :user="$user" />
@endcan


@can('announcement-create')
<livewire:usermodule::announcement.user-announcement :user="$user" />
@endcan

@endif


{{-- @include('components.popups') --}}
@endsection
