<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;
use App\User;
use App\Feedback;
use App\Report;

class PrepareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class, 3)->create();
        $posts = factory(App\Post::class, 30)->create();
	    $tags = factory(App\Tag::class, 20)->create();
	    $posts->each(function (App\Post $r) use ($tags) {
	        $r->tags()->attach(
	            $tags->random(rand(5, 10))->pluck('id')->toArray()
	        );
	    });
        $images = factory(App\Image::class, 50)->create();
        $feedback = factory(App\Feedback::class, 30)->create();
        $report = factory(App\Report::class, 30)->create();
    }
}
