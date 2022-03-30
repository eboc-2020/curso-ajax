<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Relacion uno a muchos inversa post con categoria y con user
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //relacion de muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //relacion polimorfica uno a muchos
    public function images(){
        return $this->morphMany(Image::class, 'imagenes');
    }
}
