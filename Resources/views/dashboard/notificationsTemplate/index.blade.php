@extends('layouts.simple.master')
@section('title', 'Notifications Templates')

@section('breadcrumb-title')
    <h3>Notifications Templates</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Notifications Templates</li>
    <li class="breadcrumb-item active">All</li>
@endsection

@section('content')
    <div>
        <livewire:user::notifications-templates.create  />
    </div>
    <div>
        <livewire:user::notifications-templates.notifications-template-data-table  searchable="action" exportable/>
    </div>
@endsection

@section('script')
@endsection
