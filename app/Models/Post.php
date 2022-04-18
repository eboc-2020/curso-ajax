<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;

use App\Traits\ApiTraits;
class Post extends Model
{
    use ApiTraits;

    const BORRADOR = 1;
    const PUBLICADO = 2;

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

    protected $allowIncluded = ['category','imagen'];

    protected $allowFilter = ['name','slug','extract']; 

    //Relacion uno a muchos inversa post con categoria y con user
    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id_category');
    }

    //relacion de muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //relacion polimorfica uno a muchos
    public function images(){
        return $this->morphMany(Image::class, 'imagenes');
    }

    //prueba
    public function imagen(){
        return $this->hasMany(Image::class,'imageable_id','category_id');
    }
}
