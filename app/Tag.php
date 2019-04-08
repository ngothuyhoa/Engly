<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = 'tags';
    protected $fillable = [
        'name', 'slug'
    ];

    protected $perPage;
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->perPage = config('paginate.tag');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_tags');
    }
}
