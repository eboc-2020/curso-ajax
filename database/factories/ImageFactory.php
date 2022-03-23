<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Image::class, function (Faker $faker) {
    return [
        //
        'url'=> $this->faker->image('public/storage/posts',640,480,null,false),
    ];
});
