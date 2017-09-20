@extends('admin.template.main')

@section('title','Editar Categoria' .$category->name )

@section('content')	
	<section class="wrapper">
		{!! Form::open(['route' => ['admin.categories.update', $category], 'method' => 'PUT']) !!}
			<div class="form-group">
				{!! Form::label('name','Nombre') !!}
				{!! Form::text('name',$category->name,['class' => 'form-control', 'placeholder' => 'Nombre de la categoria', 'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
			</div>
		{!! Form::close() !!}
	</section>
@endsection