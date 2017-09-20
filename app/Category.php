<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = ['name'];

    /*
		Para crear una relacion debemos crear una funcion publica que lleve por nombre el nombre del modelo de manera plural para este ejemplo nuestra categoria se va a relacionar con el articulo
    */
    public function articles()
    {
    	// indicamos el tipo de relacion para este ejemplo de muchos a muchos
    	return $this->hasMany('App\Article');
    }
}
