<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'url',
        'imageable_id',
        'imageable_type'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function post()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function user()
    {
        return $this->morphedByMany(User::class, 'taggable');
    }

}
