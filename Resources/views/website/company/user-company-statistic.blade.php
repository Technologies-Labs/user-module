@extends('layouts.simple.master')

@section('left-sidebar')
    @include('layouts.simple.left-sidebar')
@endsection

@section('content')
    <div class="col-lg-6">
        <livewire:usermodule::company.user-company-statistic/>
    </div>
@endsection

@section('right-sidebar')
    @include('layouts.simple.right-sidebar')
@endsection

@section('scripts')

@endsection
