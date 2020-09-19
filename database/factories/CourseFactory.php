<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->realtext($maxNbChars = 200, $indexSize = 3),
        'slug' => 'name',
        'category_id' => $faker->randomDigitNotNull,
        'image_link' => 'teste.jpg',
        'video' => 'https://www.youtube.com/embed/elinBMlnKVw'
    ];
});
