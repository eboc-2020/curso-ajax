<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //Relacion polimorfica: son relaciones a diferentes tablas
    public function imagenes(){
        return $this->morphTo();
    }
}
