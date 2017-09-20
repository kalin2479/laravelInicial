<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/*
	Para llamar a los modelos que utilizamos se hace de la siguiente manera:
*/
use App\Article;
class TestController extends Controller
{
    /*
		Aplicamos esto cuando indico en mi ruta que no es obligatorio enviar parametro
    	public function view($id = 0)
    */
    public function view($id)
    {
    	// utilizaremos un helper que trae laravel, y se denota así
    	//dd($id);
    	//Vamos a mostrar un articulo en particular
    	
    	$article = Article::find($id);
		$article->category;
		$article->user;
        $article->tags;
		$article->slug;
    	//dd($article);

        /*
            Ahora lo vamos a retornar a una vista

            Si queremos pasar los datos a mi vista hay dos maneras:

            Primero: pasar como 2 parametro un arreglo el cual está conformado de la
            siguiente forma: view('test.index', ['prueba' => $article])

        */
        //return view('test.index',['prueba' => $article]);
        return view('test.index2',['prueba' => $article]);
        //return view('test.detalle',['prueba' => $article]);
    }
}
