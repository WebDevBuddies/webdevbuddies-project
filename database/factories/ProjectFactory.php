<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    $statuses = [ 'Approved', 'Pending' ];

    return [
        'name' => 'Project ' . $faker->colorName,
        'description' => $faker->paragraph,
        'status' => $statuses[rand(0, count($statuses) - 1)],
    ];
});
