<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
  use HasFactory;


  protected $fillable = [
    'user_id',
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }

  public function alumno()
  {
    return $this->hasMany('App\Models\Alumno');
  }
}
