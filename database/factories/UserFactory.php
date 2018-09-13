<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password = 'password42';
    $titles = [ 'Designer', 'Front End', 'Back End' ];
    $skill_levels = [ 'Beginner', 'Intermediate', 'Advanced' ];

    return [
        'name' => $faker->name,
        'username' => $faker->username,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt($password) ?: $password = 'secret',
        'title' => $titles[rand(0, count($titles) - 1)],
        'skill_level' => $skill_levels[rand(0, count($skill_levels) - 1)],
        'remember_token' => str_random(10),
    ];
});
