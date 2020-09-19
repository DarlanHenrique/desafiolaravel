<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use App\User;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        factory(
            App\Course::class, 5)->create()->each(function($a){
                 $a->users()->attach(App\User::all()->random(5)); 
            })
    ];
});
