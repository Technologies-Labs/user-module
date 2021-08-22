@extends('layouts.simple.master')
@section('css')
@endsection

@section('style')
@endsection

@section('left-sidebar')
    @include('layouts.simple.left-sidebar')
@endsection

@section('user-profile')
    <livewire:usermodule::user-profile :user="$user" />
@endsection

@section('content')
    <livewire:usermodule::suggestion.show-user-suggestions :user="$user" />
@endsection

@section('right-sidebar')
    @include('layouts.simple.right-sidebar')
@endsection

@section('scripts')

@endsection
