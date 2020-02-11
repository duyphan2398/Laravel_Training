<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'name'=> $faker->unique()->name,
        'description' => $faker->text(100),
        'cost' => $faker->randomFloat(3,10,100000)
    ];
});
