@extends('layouts.simple.table')
@section('table-content')
@widget('datatable', [
        'data'      => $data,
        'table'     => $table,
        'columns'   => $columns,
        'actions'   => $actions,
    ])
@endsection
