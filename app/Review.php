<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use SoftDeletes;

    protected $fillable = ['star', 'name',
       'email', 'phone', 'message', 'product_id'];

    public function product()
       {
         return $this->belongsTo('App\Product', 'product_id');
       }
}
