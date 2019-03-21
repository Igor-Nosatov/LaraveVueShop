<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $fillable = ['name', 'email', 'phone', 'message', 'product_id'];

  public function product()
  {
    return $this->belongsTo('App\Product');
  }
}
