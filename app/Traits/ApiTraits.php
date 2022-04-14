<?php
namespace App\Traits;

//Es un constructor de consultas
use Illuminate\Database\Eloquent\Builder;

trait ApiTraits{



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

?>