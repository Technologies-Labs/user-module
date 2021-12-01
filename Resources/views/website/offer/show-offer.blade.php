@extends('layouts.simple.master')

@push('css_after')
<link rel="stylesheet" href="{{ asset('css/custom/jquery.countdown.css') }}">
<link rel="stylesheet" href="{{ asset('css/custom/demo-4.css') }}">
@endpush

@push('scripts_after')
<script src="js/custom/jquery.meanmenu.min.js"></script>
<!-- Custom Script-->
<script src="{{ asset('js/custom/main.js') }}"></script>
<!-- Plugins JS File -->
<script src="{{ asset('js/custom/jquery.min.js') }}"></script>
<script src="{{ asset('js/custom/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('js/custom/jquery.countdown.min.js') }}"></script>
<!-- Main JS File -->
<script src="{{ asset('js/custom/demo-4.js') }}"></script>
@endpush


@section('content')

<livewire:usermodule::offer.show-offer />
@endsection



