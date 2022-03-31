<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $primaryKey = 'id_post';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'extract',
        'body',
        'status',
        'id_user',
        'category_id'
    ];

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
