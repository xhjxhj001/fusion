<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ItemTableSeeder::class);
        $this->call(ItemCategoryTableSeeder::class);
    }

    public static function generateCreatorAndTimestamp($faker)
    {
        return [
            'created_by' => $faker->userName,
            'updated_by' => $faker->userName,
            'created_at' => $faker->unixTime(),
            'updated_at' => $faker->unixTime()
        ];
    }
}
