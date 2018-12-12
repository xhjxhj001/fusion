<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item')->insert([
            'name' => str_random(10),
            'description' => str_random(100),
            'image' => str_random(20),
            'status' => 1,
            'price' => rand(0,500),
            'created_by' => str_random(10),
            'updated_by' => str_random(10)
        ]);
    }
}
