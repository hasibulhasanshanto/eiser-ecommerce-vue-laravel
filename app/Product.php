<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'pro_name', 'pro_band', 'pro_category', 'pro_price', 'pro_offprice', 'pro_qty', 'pro_size', 'short_desc', 'long_desc', 'pro_image', 'pro_g_image', 'pro_status',  
    ];

    public function category(){
        return $this->belongsTO(Category::class, 'pro_category');
    }

    public function brand(){
        return $this->belongsTO(Brand::class, 'pro_band');
    }
}