<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Item::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    $faker->seed(rand(0,10000));
    $data = [
        'name' => $faker->foodName(),
        'description' => $faker->realText(200),
        'category_id' => rand(1, 3),
        'image' => $faker->imageUrl(120, 90, 'food', true),
        'status' => rand(-1, 2),
        'price' => rand(0, 500)
    ];
    $creator = DatabaseSeeder::generateCreatorAndTimestamp($faker);
    return array_merge($data, $creator);
});