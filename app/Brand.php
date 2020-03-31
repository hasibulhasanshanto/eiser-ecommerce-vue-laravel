<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'br_name', 'br_slug', 'br_desc', 'br_image', 'br_status',
    ];
}
