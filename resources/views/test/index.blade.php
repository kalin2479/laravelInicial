Hola kalin !!
<?php
	/* 
		nos muestra un objeto de arreglo: dd($prueba); 
	*/
	/*
		Si deseamos mostrar una información en particular lo hacemos así:
		$prueba->title
		echo $prueba->title;
	*/
	

	/*
		Conclusión: Lo que estamos haciendo aquí es mostrar datos en php lo cual no está bien, 
		es por esa razón que nos trae una solución que es utilizar a dobler llave sin necesidad de 
		utilizar php {{}}
	*/
?>

{{ $prueba->id }}

@for($i = 0; $i <= 5; $i++)
	{{ $i }}
@endfor

@if(1==1)
	{{ "Es igual a 1" }}
@endif

<?php
/*
Ademas nos trae:

@include()
@section()
@yield()
@extends()


<ul>
@foreach($prueba as $pru)
	<li>{{ $pru->id }}</li>
@endforeach
</ul>
*/
?>