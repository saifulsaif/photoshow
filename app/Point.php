<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
  protected $fillable = [
      'point', 'user_id',
  ];
}
