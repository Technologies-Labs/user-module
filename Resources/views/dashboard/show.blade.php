@extends('layouts.simple.master')
@section('title', 'Show Role')

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
<li class="breadcrumb-item active">show</li>
@endsection

{{-- @section('content')

<div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">

              <div class="x_content">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Show Role</h2>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $role->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permissions:</strong>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <label class="label label-success">{{ $v->name }},</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

              </div>
            </div>
          </div>


      </div>
    </div>
  </div>




@endsection --}}

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
            <div class="card">
				<div class="card-header">
					<h5>Show Role</h5>
				   </div>
					<div class="card-body">
                        <div class="row">
							<div class="col">
								<div class="mb-3">
                                    <strong>Name:</strong>
                                    {{ $role->name }}
								</div>
							</div>
						</div>
                        <div class="row">
							<div class="col">
								<div class="mb-3">
                                    <strong>Permissions:</strong>
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $permission)
                                          <span class="badge badge-success badge-bg" >{{ $permission->name }}</span>
                                        @endforeach
                                    @endif
								</div>
							</div>
						</div>
			     </div>
            </div>
		</div>
	</div>
</div>

@endsection
@section('script')

@endsection














