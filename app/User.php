<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $perPage;
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->perPage = config('paginate.user');
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
