<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ItemCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\ItemCategory::class, 3)->create();
    }
}
