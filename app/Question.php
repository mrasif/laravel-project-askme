<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $fillable=[
    'title',
    'description',
    'user_id'
  ];

  public function user()
  {
    // Question has single user
    return $this->belongsTo('App\User');
  }

  public function answers()
  {
    // Question has many answer
    return $this->hasMany('App\Answer');
  }
}
