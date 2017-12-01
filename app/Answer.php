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
    return $this->belongsTo('App\User');
  }

  public function question()
  {
    return $this->belongsTo('App\Question');
  }

  public function likes()
  {
    return $this->hasMany('App\Like');
  }


}
