@extends('admin.template.main')

@section('title','Editar Usuario ' .$user->name)

@section('content')
	<section class="wrapper">
		{!! Form::open(['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
			<div class="form-group">
				{!! Form::label('name','Nombre') !!}
				{!! Form::text('name',$user->name,['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('email','Correo Electronico') !!}
				{!! Form::text('email',$user->email,['class' => 'form-control', 'placeholder' => 'Correo@gmail.com', 'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('type','Type') !!}
				{!! Form::select('type',['' => 'Seleccione el tipo','member' => 'Miembro', 'admin' => 'Adminstrador'], $user->type) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
			</div>
		{!! Form::close() !!}
	</section>
@endsection