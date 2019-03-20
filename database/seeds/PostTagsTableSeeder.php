<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

class PostTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = factory(App\Post::class, 30)->create();
	    $tags = factory(App\Tag::class, 20)->create();
	    $posts->each(function (App\Post $r) use ($tags) {
	        $r->tag()->attach(
	            $tags->random(rand(5, 10))->pluck('id')->toArray()
	        );
	    });
    }
}
