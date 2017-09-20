@extends('admin.template.main')

@section('title','Crear Usuario')

@section('content')	
	<section class="wrapper">

		{!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}
			<div class="form-group">
				{!! Form::label('name','Nombre') !!}
				{!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('email','Correo Electronico') !!}
				{!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'Correo@gmail.com', 'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('password','Contraseña') !!}
				{!! Form::password('password',['class' => 'form-control', 'placeholder' => '*******', 'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('type','Type') !!}
				{!! Form::select('type',['' => 'Seleccione el tipo','member' => 'Miembro', 'admin' => 'Adminstrador']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
			</div>
		{!! Form::close() !!}
	</section>
@endsection