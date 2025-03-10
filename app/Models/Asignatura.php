<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class Asignatura extends Model
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = ['name', 'maestro_id', 'degree_id'];

  protected $allowFilter = ['id', 'name', 'maestro_id', 'degree_id',];
  protected $allowSort = ['id', 'name', 'maestro_id', 'degree_id',];


  public function scopeIncluded(Builder $query)
  {

    // if(empty($this->allowIncluded)||empty(request('included'))){
    //     return;
    // }

    $relations = explode(',', request('included')); //['posts','relation2']

    $allowIncluded = collect($this->allowIncluded); //colocamos en una colecion lo que tiene $allowIncluded en este caso = ['posts','posts.user']

    foreach ($relations as $key => $relationship) { //recorremos el array de relaciones

      if (!$allowIncluded->contains($relationship)) {
        unset($relations[$key]);
      }
    }
    $query->with($relations); //se ejecuta el query con lo que tiene $relations en ultimas es el valor en la url de included

  }


  //http://api.our.com/v1/mensajes/10?included=chat,chat.degree

  ////////////////////////////////////////////////////////

  public function scopeFilter(Builder $query)
  {


    if (empty($this->allowFilter) || empty(request('filter'))) {
      return;
    }

    $filters = request('filter');
    $allowFilter = collect($this->allowFilter);

    foreach ($filters as $filter => $value) {

      if ($allowFilter->contains($filter)) {
        $query->where($filter, 'LIKE', '%' . $value . '%');
      }
    }
    //http://api.our.com/v1/mensajes?filter[chat_id]=13
    // http://api.our.com/v1/mensajes?filter[contenido]=Tem
    //http://api.our.com/v1/mensajes?filter[remitente]=Dr.

  }




  //////////////////////////////////////////////////////////////////////////////////



  public function scopeSort(Builder $query)
  {


    if (empty($this->allowSort) || empty(request('sort'))) {
      return;
    }


    $sortFields = explode(',', request('sort'));
    $allowSort = collect($this->allowSort);

    foreach ($sortFields as $sortField) {

      if ($allowSort->contains($sortField)) {

        $query->orderBy($sortField, 'asc');
      }
    }


    //http://api.our.com/v1/mensajes?sort=remitente


  }





  public function maestro()
  {
    return $this->belongsTo('App\Models\Maestro');
  }


  public function guias()
  {
    return $this->hasMany('App\Models\Guia');
  }

  public function activities()
  {
    return $this->hasMany('App\Models\Activity');
  }
  public function degree()
  {
    return $this->belongsTo('App\Models\Degree');
  }
}
