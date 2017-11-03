<?php

namespace App;

//use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  //use HasApiTokens, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 
    'email', 
    'password', 
    'first_name',
    'last_name',
    'middle_name',
    'email',
    'website',
    'aoa_id',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  protected $primaryKey = 'aoa_id';

  public $incrementing = false;

  public function address() {
    return $this->hasOne(Address::class, 'aoa_id');
  }
}
