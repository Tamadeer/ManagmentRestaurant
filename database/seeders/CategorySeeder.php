<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'name' => 'دجاج',
            ]);
        Category::create([
            'name' => 'لحوم',
        ]);
        Category::create([
            'name' => 'حلويات',
        ]);
        Category::create([
            'name' => 'عصائر',
        ]);


//        Category::create([
//            'name' => 'Seafood',
//            'type'=>'grilled'
//            ]);
//        Category::create([
//            'name' => 'Seafood',
//            'type'=>'fried'
//        ]);
//
//        Category::create([
//            'name' => 'potato',
//            'type'=>'grilled'
//        ]);
//        Category::create([
//            'name' => 'Strawberry',
//            'type'=>'juices'
//        ]);
//        Category::create([
//            'name' => 'banana',
//            'type'=>'juices'
//        ]);
//        Category::create([
//            'name' => 'orange',
//            'type'=>'juices'
//        ]);

    }
}
