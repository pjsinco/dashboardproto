<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $fillable = [ 'aoa_id' ];

  protected $primaryKey = 'aoa_id';
  
  public $incrementing = false;

  public function user() {
    return $this->hasOne(User::class, 'aoa_id');
  }
}
