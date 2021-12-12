@extends('layouts.simple.master')

@push('css_after')
<link rel="stylesheet" href="{{ asset('css/custom/jquery.countdown.css') }}">
<link rel="stylesheet" href="{{ asset('css/custom/demo-4.css') }}">
@endpush

@push('scripts_after')
{{-- <script src="{{ asset('js/custom/jquery.meanmenu.min.js') }}"></script>
<!-- Custom Script-->
<script src="{{ asset('js/custom/main.js') }}"></script> --}}
<!-- Plugins JS File -->
{{-- <script src="{{ asset('js/custom/jquery.min.js') }}"></script> --}}
<script src="{{ asset('js/custom/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('js/custom/jquery.countdown.min.js') }}"></script>
<!-- Main JS File -->
<script src="{{ asset('js/custom/demo-4.js') }}"></script>
@endpush

@section('content')

<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="page-contents" class="row merged20">
                        <div class="col-lg-12">

                            <livewire:usermodule::offer.show-offer />

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>



@endsection



