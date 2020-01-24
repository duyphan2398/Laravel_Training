<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Student_Subject::class, function (Faker $faker) {
    return [
        'student_id' => App\Student::all()->random()->first()->id,
        'subject_id' => App\Subject::all()->random()->first()->id
    ];
});
