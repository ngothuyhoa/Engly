<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';
    protected $fillable = [
        'user_id', 'title', 'content', 'view', 'vote', 'slug'
    ];

    protected $perPage;
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->perPage = config('paginate.post');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'post_tags');
    }
}
