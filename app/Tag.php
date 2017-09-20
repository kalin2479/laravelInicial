<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = ['name'];

    /*
		Cuando la relacion es de muchos a muchos lo definimos con la instrucción
		belongsToMany()
	*/
    public function articles()
    {
    	/*
    	En el caso de muchos a muchos se puede tener problema con las fechas, para ello agregamos la siguiente instrucción withTimestamps().
    	*/
    	return $this->belongsToMany('App\Article')->withTimestamps();
    }
}
