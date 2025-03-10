<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = ['name', 'lastname', 'email', 'password', 'role_id'];
  protected $allowIncluded = ['role', 'image', 'maestro', 'padre', 'alumno', 'alumno.degree', 'alumno.padre', 'maestro.degree', 'alumno.padre.user',];
  protected $allowFilter = ['id', 'name', 'role_id'];
  protected $allowSort = ['id', 'name', 'role_id'];

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

  //////////////////////////////////////////////////////////////////

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
    //http://api.our.com/v1/users?filter[nombre]=S

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
  }


  //http://api.our.com/v1/users?sort=nombre








  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];




  use HasFactory;
  public function role()
  {
    return $this->belongsTo('App\Models\Role');
  }


  public function notifications()
  {
    return $this->belongsToMany('App\Models\Notification');
  }




  public function image()
  {
    return $this->hasOne('App\Models\Image');
  }

  public function maestro()
  {
    return $this->hasOne('App\Models\Maestro');
  }
  public function padre()
  {
    return $this->hasOne('App\Models\Padre');
  }
  public function alumno()
  {
    return $this->hasOne('App\Models\Alumno');
  }
}
