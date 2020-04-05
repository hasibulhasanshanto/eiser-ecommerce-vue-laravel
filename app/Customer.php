<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'f_name', 'l_name', 'email', 'phone', 'password', 'address',
    ];
}