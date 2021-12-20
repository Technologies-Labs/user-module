@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Users</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Users</li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
            <div class="card">
					<div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                       @endif
                       {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                        <div class="row">
							<div class="col">
								<div class="mb-3">
									<label for="name"><strong>Name</strong></label>
									{!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required')) !!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="mb-3">
									<label for="email"><strong>Email</strong> </label>
									{!! Form::email('email', null, array('placeholder' => 'torindo@ example.com','class' => 'form-control','required')) !!}

								</div>
							</div>
						</div>
                        <div class="row">
							<div class="col">
								<div class="mb-3">
									<label for="email"><strong>Phone number</strong> </label>
									{!! Form::number('phone', null, array('placeholder' => 'phone number','class' => 'form-control','required')) !!}

								</div>
							</div>
						</div>
                        <div class="row">
							<div class="col">
								<div class="mb-3">
									<label><strong>Password</strong> </label>
									{!! Form::password('password', array('placeholder' => 'password','class' => 'form-control','required')) !!}
								</div>
							</div>
						</div>
                        <div class="row">
							<div class="col">
								<div class="mb-3">
									<label for="email"><strong>Confirm Password</strong> </label>
									{!! Form::password('confirm-password', array('placeholder' => 'confirm password','class' => 'form-control','required')) !!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="mb-3">
                                    <label for="roles">Roles</label>
									<select class="form-select " id="roles"  name="roles[]">
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{ $role->display_name }}</option>
                                        @endforeach
									</select>
								</div>
							</div>
						</div>
					<div class="card-footer">
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>
                {!! Form::close() !!}
			</div>
            </div>
		</div>
	</div>
</div>
@endsection
@section('script')
@endsection






