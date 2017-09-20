@extends('admin.template.main')

@section('title','Inicio de mi Página')

@section('content')
	<h2>
		Hola este es una prueba {{ $prueba->slug }}
	</h2>
	<a href="http://wwwl.google.con.pe">Google</a>
@endsection
