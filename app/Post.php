<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;


class Post extends Model
{
    //use Searchable;
	protected $table = 'posts';
    protected $fillable = [
        'user_id', 'title', 'content', 'view', 'vote', 'status', 'slug'
    ];

    protected $perPage;
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->perPage = config('paginate.post');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tags');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }   

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id')->orderBy('id', 'DESC');
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('published', false);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
      $array = $this->toArray();
         
      return array('id' => $array['id'],'title' => $array['title'], 'content' => $array['content']);
    }
}
