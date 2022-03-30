<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {

    //para crear datos falsos con 20character
    $name = $this->faker->unique()->word(20); 
    
    return [
        //Hola mundo => Hola-mundo
        'name' => $name,
        'slug' => Str::slug($name), //slug es el mismo nombre separado con guion
    ];
});
