<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'url',
        'imageable_id',
        'imageable_type',
        'created_at',
        'updated_at',
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function Post()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function User()
    {
        return $this->morphedByMany(User::class, 'taggable');
    }

}
