<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'pro_name', 'pro_band', 'pro_category', 'pro_price', 'pro_offprice', 'pro_qty', 'pro_size', 'short_desc', 'long_desc', 'pro_image', 'pro_g_image', 'pro_status',  
    ];
}