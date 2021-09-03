@extends('layouts.simple.master')

@section('left-sidebar')
    @include('layouts.simple.left-sidebar')
@endsection

@section('user-profile')
    <livewire:usermodule::user-profile :user="$user" />
@endsection

@section('content')
    <div class="col-lg-6">
        <livewire:usermodule::user-information/>
    </div>
@endsection

@section('right-sidebar')
    @include('layouts.simple.right-sidebar')
@endsection

@section('scripts')

@endsection
