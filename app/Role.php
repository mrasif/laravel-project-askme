<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $fillable=[
    'name'
  ];

  public function users(){
    // Role can be role of many users
    return $this->hasMany('App\User');
  }
}
