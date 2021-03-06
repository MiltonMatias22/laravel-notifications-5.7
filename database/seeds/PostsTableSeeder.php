<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 50 fake posts
        factory(Post::class, 50)->create();
    }
}
