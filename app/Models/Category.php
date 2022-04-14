<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ApiTraits;

class Category extends Model
{

    use ApiTraits;

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
}
