<?php

use Faker\Generator as Faker;


$factory->define(App\Project::class, function (Faker $faker) use ($factory) {
    return [
        'user_id' => $factory->create(App\User::class)->id,
        'project_name' => $faker->sentence,
        'project_description' => implode($faker->paragraphs(2)),
        'project_creation_date' => \Carbon\Carbon::now(),

    ];
});