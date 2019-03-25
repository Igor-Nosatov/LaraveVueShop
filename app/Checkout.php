<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
  protected $fillable = [
    'firstname', 'lastname','company', 'phone', 'email',
    'country', 'adressone', 'adresstwo','city',
    'district', 'postcode','total'
  ];
}
