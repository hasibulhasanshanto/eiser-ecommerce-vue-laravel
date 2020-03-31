<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'cat_name' => $faker->streetName,
        'cat_desc' => $faker->text($maxNbChars = 300),
        'cat_image' => $faker->imageUrl($width = 300, $height = 300), 
        'cat_status' => 1 ,        
        'created_at' => now(),
    ];
});
