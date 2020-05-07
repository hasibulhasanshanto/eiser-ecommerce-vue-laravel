<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'cat_name', 'cat_slug', 'cat_desc', 'cat_image', 'cat_status',
    ];

    public function product(){
        return $this->hasMany(Product::class, 'id');
    }
}