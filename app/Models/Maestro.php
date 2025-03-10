<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
  ];


  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }

  public function degrees()
  {
    return $this->belongsToMany('App\Models\Degree');
  }

  public function asignatura()
  {
    return $this->hasMany('App\Models\Asignatura');
  }



  public function activities()
  {
    return $this->hasMany('App\Models\Activity');
  }
}
