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
    return $this->belongsTo('App\User');
  }

  public function answer()
  {
    return $this->belongsTo('App\Answer');
  }

}
