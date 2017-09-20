<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
	Es una ruta de tipo Get el cual dirige a la raiz de nuestra pagina web, y la del 2 parametro que tiene una funcion que te retorna una vista llamada welcome.

	Los Tipos son:
	GET, POST, PUT, DELETE, RESOURCE ENTRE OTRAS.
*/
Route::get('/', function () {
    return view('welcome');
});
/*
	Es sin recibir parametros	
	Route::get('articles',function(){
		echo "Este es mi articulo";
	});
*/

/*
	Esto es recibiendo un parametro
	Route::get('articles/{nombre}',function($nombre){
		echo "El nombre que has colocado es: ". $nombre;
	});

*/

/*
	Cuando queremos que el parámetro no sea obligatorio
	Route::get('articles/{nombre?}',function($nombre = "No se ha colocado parámetro"){
		echo "El nombre que has colocado es: ". $nombre;
	});
*/

/*
	Cuando deseamos crear nombres a las rutas se escribe como se muestra lineas abajo.

	Ademas podemos indicar que esta ruta use un controlador para este ejemplo es 'uses'

	Ademas indicamos que el parámetro no es obligatorio, y el condicional lo ponemos en 
	el controlador
	Route::get('articles/{id?}',[
		'as' 	=> 'articles',
		'uses' 	=> 'TestController@view'
	]);
*/

	
/*
	Ahora crearemos un grupo de rutas
	Route::group(['prefix' => 'articles'],function(){
		Route::get('view/{article?}',function($article = "vacio"){
			echo $article;
		});
	});
*/
	
/*
	Aprovechando el grupo de rutas, haremos el ejemplo con un controlador.
	as -> nombre de la ruta, esto se hace para evitar problemas

Route::group(['prefix' => 'articles'],function(){
	Route::get('view/{id}',[
		'uses'	=>	'TestController@view',
		'as'	=>	'articlesView'
	]);
});

*/

Route::group(['prefix' => 'admin'], function(){
	/*
	*	resource --> [funcion] lo que hace es crear como un estilo de api rest full
		tomar los metodos de un controlador e imprmirlos como hilos de rutas.
		Recibe dos parametros: 
		- Primero es el nombre para el grupo de rutas que va a creer resource.
		- Segundo es el nombre del controlador.
	*/
	/*
	* as -> estamos asiganado una ruta que tendra el mismo nombre para este ejemplo
	*/
	Route::resource('users', 'UsersController');
	Route::get('users/{id}/destroy',[
		'uses' 	=> 'UsersController@destroy',
		'as' 	=> 'admin.users.destroy'
	]);

	/*
	* vamos a crear las rutas para las categorias
	*/
	Route::resource('categories', 'CategoriesController');
	Route::get('categories/{id}/destroy', [
		'uses' => 'CategoriesController@destroy',
		'as'   => 'admin.categories.destroy'
	]);
});

Route::auth();

Route::get('/home', 'HomeController@index');
