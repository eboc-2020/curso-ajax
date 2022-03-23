<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //Relacion de muchos a muchos
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
