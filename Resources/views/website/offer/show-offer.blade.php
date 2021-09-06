@extends('layouts.simple.master')
@section('css')
@endsection

@section('style')
@endsection

@section('left-sidebar')
    @include('layouts.simple.left-sidebar')
@endsection

@section('content')
    <livewire:usermodule::offer.show-offer/>
@endsection

@section('right-sidebar')
    @include('layouts.simple.right-sidebar')
@endsection

@section('scripts')

@endsection
