<?php

namespace App;

use App\Concern\Mediable;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
  use  Mediable;
  protected $fillable = [
    'name',
    'description',
  ];
    //
}
