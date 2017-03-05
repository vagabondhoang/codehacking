@extends('layouts.admin')

@section('content')
<h1>Create Users</h1>
<div class="row">
	{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store','files'=>true]) !!}
	
	<div class="form-group">
		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('email', 'Email:') !!}
		{!! Form::email('email', null, ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('role_id', 'Role:') !!}
		{!! Form::select('role_id', [''=>'Choose Role']+ $roles, null, ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('is_active', 'Status:') !!}
		{!! Form::select('is_active', [1=>'Active', 0=>'Not Active'], null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('photo_id', 'Photo:') !!}
		{!! Form::file('photo_id', null) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Create Users', ['class'=>'btn btn-primary col-sm-6']) !!}
	</div>

	{!! Form::close() !!}
</div>

<br>
@include('includes.form-errors')
@endsection