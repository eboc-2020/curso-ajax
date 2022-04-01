<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//Es un constructor de consultas
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id_category';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug'
    ];

    //son las relaciones que pueden existir
    protected $allowIncluded = ['posts','posts.user'];

    protected $allowFilter = ['name','slug','id_category'];

    //Relacion de uno a muchos
    public function posts(){
        return $this->hasMany(Post::class,'category_id','id_category');
    }

    public function scopeIncluded(Builder $query){
        //si por la url solo se envia el id
        if(empty($this->allowIncluded)||empty(request('included'))){
            return;
        }

        //$query esta variable es la consulta que tenemos en CategoryController included()
        $relations = explode(',',request('included')); //included es la variable que ingreso en la ruta
        //Para ingresar varias relaciones posts,relacion2
        //explode metodo que convierte la cadena en un array ['posts','relacion2']

        $allowIncluded = collect($this->allowIncluded);
        
        foreach ($relations as $key => $relationship) {

            //si el valor relationship se encuentra dentro de la coleccion $allowIncluded dentro del array
            if (!$allowIncluded->contains($relationship)) {
                //si uno de los elementos no existe eliminar unset
                unset($relations[$key]);
            }
        }

        $query->with($relations);

    }

    public function scopeFilter(Builder $query){
        if (empty($this->allowFilter) || empty(request('filter'))) {

            return;
        }

        $filters=request('filter');
        $allowFilter = collect($this->allowFilter);

        foreach ($filters as $filter => $value) {
            if ($allowFilter->contains($filter)) {
                $query->where($filter, 'LIKE','%' . $value . '%');
            }
        }
    }
}
