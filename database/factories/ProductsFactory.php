<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        //
        'product_name'=>$faker->name,
        'product_description'=>$faker->paragraph,
        'product_img'=>"https://picsum.photos/200/300",
        'brands_id'=>1,
        'stock'=>20,
        'product_price'=>20.0
    ];
});
