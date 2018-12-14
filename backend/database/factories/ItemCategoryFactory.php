<?php

use Faker\Generator as Faker;

$factory->define(App\Model\ItemCategory::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    $data = [
        'title' => $faker->foodName(),
        'status' => 1
    ];
    $creator = DatabaseSeeder::generateCreatorAndTimestamp($faker);
    return array_merge($data, $creator);
});
