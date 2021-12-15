<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brands;
use Faker\Generator as Faker;

$factory->define(Brands::class, function (Faker $faker) {
    return [
        'brand_name'=>$faker->name
    ];
});
