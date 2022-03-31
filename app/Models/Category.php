<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id_category';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug'
    ];
    //Relacion de uno a muchos
    public function posts(){
        return $this->hasMany(Post::class,'category_id','id_category');
    }
}
