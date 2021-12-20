@extends('layouts.simple.master')

@push('css_middle')
<link rel="stylesheet" href="{{ asset('css/lightbox.html') }}">
@endpush

@push('scripts_before')
<script src="{{ asset('js/uikit.min.js') }}"></script>
@endpush

@section('content')

<livewire:user::user-profile :user="$user" />

<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="page-contents" class="row merged20">
                        <div class="col-lg-3">
                            <aside class="sidebar static right">
                                @livewire('user::user.complete-profile', ['user' => $user])

                                @livewire('advertisement::position-advertisements', ['position' => Modules\Advertisement\Enum\AdvertisementPositionEnum::SIDEBAR])
                            </aside>
                        </div>

                        <div class="col-lg-6">
                            <div class="tab-content">

                                {{-- timeline --}}
                                <livewire:product::product-list :user="$user" :isCurrantUser="$isCurrantUser" />


                                {{-- Groups --}}
                                @if ($isCurrantUser)
                                <livewire:group::group.user-groups :user="$user" :isCurrantUser="$isCurrantUser" />
                                @endif

                                {{-- Offers --}}
                                <div class="tab-pane fade" id="Offers" wire:ignore.self>
                                    <livewire:user::offer.user-offer :user="$user" :isCurrantUser="$isCurrantUser" />
                                </div>



                                {{-- Information --}}
                                <livewire:user::company.user-contact-us :user="$user" :isCurrantUser="$isCurrantUser" />

                                {{-- Suggestion --}}
                                @if($isCurrantUser)
                                <livewire:user::suggestion.show-user-suggestions :user="$user" />
                                @endif

                                {{-- About --}}
                                @if($isCurrantUser)
                                <div class="tab-pane fade " id="company" wire:ignore.self>
                                    <livewire:user::company.company-banner :user="$user" :isCurrantUser='$isCurrantUser'  />
                                    <livewire:user::company.company-services :user="$user" :isCurrantUser='$isCurrantUser'  />
                                    <livewire:user::company.company-statistics :user="$user" :isCurrantUser="$isCurrantUser">
                                    <livewire:user::company.company-customer-say :user="$user" :isCurrantUser="$isCurrantUser" />
                                </div>
                                @endif



                            </div>
                        </div>

                        <div class="col-lg-3">
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

@section('popups')
@if(!$isCurrantUser)

@can('suggestion-create')
<livewire:user::suggestion.user-suggestion :user="$user" />
@endcan


@can('announcement-create')
<livewire:user::announcement.user-announcement :user="$user" />
@endcan

@endif


{{-- @include('components.popups') --}}
@endsection
