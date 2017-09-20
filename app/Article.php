<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
	/*
	* Configuramos en el modelo que corresponde el slug
	*/

	use Sluggable;

	/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = "articles";
    protected $fillable = ['title','content','user_id','category_id'];

     /*
		Se estable la relacion, pero el nombre de la funcion es al reves.
		Aqui es un singular porque un articulo solo pertenece a una categoria.
    */
    public function category()
    {    	
    	return $this->belongsTo('App\Category');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    /*
		Establecemos la relacion uno a muchos hacia imagenes, ya que un articulo puede tener una o muchas imagenes
    */
	public function images()
	{
		return $this->hasMany('App\Image');
	}
	/*
		Cuando la relacion es de muchos a muchos lo definimos con la instrucción
		belongsToMany()
	*/
	public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}
}
