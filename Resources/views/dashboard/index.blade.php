{{-- @extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Roles</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Roles</li>
<li class="breadcrumb-item active">All</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<!-- Zero Configuration  Starts-->
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
                     <table class="display" id="basic-1">
                        <thead>
                            @if($message = Session::get('success'))
                            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                                <i data-feather="thumbs-up"></i>
                                <p>{{ $message }}</p>
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                            @endif
                            @can('user-create')
                                <div style="margin-bottom:5px ">
                                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create user</a>
                                </div>
                            @endcan
                            <tr>
                                <th>No</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Roles</th>
                                @can('user-activate')
                                <th>Activation</th>
                                @endcan
                                <th>Action</th>
                            </tr>
                         </thead>
                            <tbody>
                            @foreach ($users as $key => $user)
                                <tr id="delete_users_{{ $user->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <label class="badge badge-success">{{ $role->display_name}}</label>
                                        @endforeach
                                    </td>
                                    @can('user-activate')
                                    <td>
                                        <div class="media-body text-center icon-state switch-outline">
                                            <label class="switch"  for="user-activation-{{$user->id}}">
                                            <input type="checkbox"  @if ($user->is_active) checked @endif class="custom-control-input" id="user-activation-{{$user->id}}" onclick="activate_item('users',{{$user->id}})"><span class="switch-state bg-success"></span>
                                            </label>
                                        </div>
                                    </td>
                                    @endcan

                                    <td class="text-center">
                                        @can('user-edit')
                                        <a class="btn btn-primary m-b-5"  href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can('user-delete')
                                           <a href="javascript:void(0);" onclick="delete_item({{ $user->id }},'users')" class="btn btn-danger m-b-5"><i class="fa fa-trash"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection --}}
@widget('datatable')
