<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'جواز سفر']);
        Category::create(['name' => 'ضمان سيارة']);
        Category::create(['name' => 'رخصة قبادة']);
    }
}
