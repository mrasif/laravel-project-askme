<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

  protected $fillable=[
    'description',
    'question_id',
    'user_id'
  ];

  public function user()
  {
    // Answer has only one user
    return $this->belongsTo('App\User');
  }

  public function question()
  {
    // Answer has only one question
    return $this->belongsTo('App\Question');
  }

  public function likes()
  {
    // Answer has many likes
    return $this->hasMany('App\Like');
  }


}
