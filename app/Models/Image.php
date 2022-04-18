<?php

namespace App\Models;

use App\Traits\ApiTraits;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    use ApiTraits;
    
    protected $table = 'images';

    protected $primaryKey = 'id_images';

    public $timestamps = false;

    protected $fillable = [
        'url',
        'imageable_id',
        'imageable_type'

    ];
    //Relacion polimorfica: son relaciones a diferentes tablas
    public function imagenes(){
        return $this->morphTo();
    }
}
