<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  protected $table = 'cart';

  protected $fillable = [
      'name', 'image', 'price', 'qty'
  ];
}
