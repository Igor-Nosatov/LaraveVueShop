<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use SoftDeletes;

  protected $table = 'comments';

  protected $fillable = ['name', 'email', 'phone', 'message', 'product_id'];

  public function product()
  {
    return $this->belongsTo('App\Product', 'product_id');
  }
}
