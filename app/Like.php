<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  protected $fillable=[
    'like',
    'answer_id',
    'user_id'
  ];

  public function user()
  {
    // Single like can given by single user
    return $this->belongsTo('App\User');
  }

  public function answer()
  {
    // Like can be given on Answer
    return $this->belongsTo('App\Answer');
  }

}
