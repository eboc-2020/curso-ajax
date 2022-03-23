<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        $this->call(UserSeeder::class); //se llama los seeders para crear factory
        Category::factory(4)->create();
        Tag::factory(4)->create();
        $this->call(PostSeeder::class);
    }
}
