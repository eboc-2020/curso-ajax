<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //parent::toArray($request) muestra todos los datos 
        return [
            'identificador'=>$this->id_category,
            'descripcion' =>$this->name,
            'post' =>$this->whenLoaded('posts')
        ];
    }
}
