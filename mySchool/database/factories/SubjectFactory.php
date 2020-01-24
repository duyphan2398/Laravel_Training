<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Subject::class, function (Faker $faker) {
    return [
        'name' => 'Subject '.$faker->sentence($nbWords = 3, $variableNbWords = true),
        'credit' => $faker-> randomDigitNot(5),
        'id_teacher' => App\Teacher::all()->random()->first()->id

    ];
});
