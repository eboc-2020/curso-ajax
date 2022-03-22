<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    //Relacion de uno a muchos
    public function category(){
        return $this->hasMany(Post::class);
    }
}
