<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\User;


$factory->define(Post::class, function (Faker $faker) {
    $name = $this->faker->unique()->word(20);
    return [
        //
        'name'=>$name,
        'slug' =>Str::slug($name),
        'extact' => $this->faker->text(250),
        'body' => $this->faker->text(2000),
        'status' => $this->faker->randomElement([1,2]),
        'id_categoria'=> Category::all()->random()->id,
        'id_user'=> User::all()->random()->id

    ];
});
