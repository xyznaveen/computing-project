<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'profile_id' , 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post() {
      return $this->hasMany('App\Post');
    }

    public function like() {
      return $this->hasMany('App\Like');
    }

    public function comment() {
      return $this->hasMany('App\Comment');
    }

    public function message() {
      return $this->hasMany('App\Message');
    }

    public function friend() {
      return $this->hasMany('App\Friend');
    }

    public function profile() {
      return $this->hasOne('App\Profile');
    }

}
