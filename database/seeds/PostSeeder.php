<?php

use App\Post;
use App\Image;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::factory(25)->create->each(function (Post $post){
            Image::factory(4)->create([
                'image_id'=>$post->id,
                'image_type'=>Post::class
            ]);

            $post->tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
        });
    }
}
