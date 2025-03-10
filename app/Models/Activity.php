<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;


    protected $fillable = ['actividad_url', 'titulo', 'descripcion', 'fechaInicio', 'fechaFin', 'asignatura_id'];


    public function asignatura()
    {
        return $this->belongsTo('App\Models\Asignatura');
    }


    public function evidencias()
    {
        return $this->hasMany('App\Models\Evidencia');
    }


    public function maestro()
    {
        return $this->belongsTo('App\Models\Maestro');
    }


    public function degree()
    {
        return $this->belongsTo('App\Models\Degree');
    }
}
