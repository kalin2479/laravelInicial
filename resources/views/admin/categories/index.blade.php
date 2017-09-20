@extends('admin.template.main')

@section('title','Lista de Categorias')

@section('content')
	<section class="wrapper">
		<a href="{{ route('admin.categories.create') }}" class="btn btn-info">Registrar nueva categoria</a>
		<br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>
						ID
					</th>
					<th>
						Nombre
					</th>					
					<th>
						Acción
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
					<tr>
						<td>
							{{ $category->id }}
						</td>
						<td>
							{{ $category->name }}
						</td>						
						<td>
							<a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-warning glyphicon glyphicon-wrench"></a>
							<a href="{{ route('admin.categories.destroy',$category->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger glyphicon glyphicon-record"></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $categories->render() !!}
	</section>
@endsection