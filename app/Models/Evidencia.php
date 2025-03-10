<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
  use HasFactory;


  protected $fillable = ['evidencia_url', 'fechaSubida', 'asignatura_id'];



  public function activity()
  {
    return $this->belongsTo('App\Models\Activity');
  }
}
