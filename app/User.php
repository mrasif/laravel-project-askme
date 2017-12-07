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
        'name', 'email', 'password','city','country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
      // User has only one role
      return $this->belongsTo('App\Role');
    }

    public function questions()
    {
      // User has many questions
      return $this->hasMany('App\Question');
    }

    public function answers()
    {
      // User has many answer
      return $this->hasMany('App\Answer');
    }

    public function likes()
    {
      // User can give many Likes
      return $this->hasMany('App\Like');
    }
}
