<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meal::create([
//            'type'=>'دجاج',
            'name' => 'شاورما',
            'description'=>'سندويش',
            'image'=>'شاورما ',
            'category_id'=>'1',
            'price'=>'10',
        ]);

        Meal::create([
//            'type'=>'دجاج',
            'name' => 'كريسبي',
            'description'=>'عربي',
            'image'=>'شاورما ',
            'category_id'=>'1',
            'price'=>'13',
        ]);

        Meal::create([
//            'type'=>'دجاج',
            'name' => 'بروستد',
            'description'=>'بروستد مع بطاطا',
            'image'=>'بروستد ',
            'category_id'=>'1',
            'price'=>'15',
        ]);
        Meal::create([
//            'type'=>'حلويات',
            'name' => 'بوظة',
            'description'=>'..',
            'image'=>'.. ',
            'category_id'=>'3',
            'price'=>'16',
        ]);
        Meal::create([
//            'type'=>'عصائر',
            'name' => 'برتقال',
            'description'=>'..',
            'image'=>'.. ',
            'category_id'=>'4',
            'price'=>'17',
        ]);
        Meal::create([
//            'type'=>'لحوم',
            'name' => 'كباب',
            'description'=>'..',
            'image'=>'.. ',
            'category_id'=>'2',
            'price'=>'18',
        ]);
        DB::table('restaurant_category')->insert(['restaurant_id'=>1,'category_id'=>1]);
        DB::table('restaurant_category')->insert(['restaurant_id'=>4,'category_id'=>1]);
//        DB::table('restaurant_category')->insert(['restaurant_id'=>1,'category_id'=>2]);
//        DB::table('restaurant_category')->insert(['restaurant_id'=>1,'category_id'=>3]);
        DB::table('restaurant_category')->insert(['restaurant_id'=>2,'category_id'=>3]);
//        DB::table('restaurant_category')->insert(['restaurant_id'=>2,'category_id'=>5]);
//        DB::table('restaurant_category')->insert(['restaurant_id'=>2,'category_id'=>3]);
        DB::table('restaurant_category')->insert(['restaurant_id'=>3,'category_id'=>4]);
//        DB::table('restaurant_category')->insert(['restaurant_id'=>3,'category_id'=>2]);
//        DB::table('restaurant_category')->insert(['restaurant_id'=>3,'category_id'=>3]);
        DB::table('restaurant_category')->insert(['restaurant_id'=>4,'category_id'=>2]);
//        DB::table('restaurant_category')->insert(['restaurant_id'=>4,'category_id'=>2]);
//        DB::table('restaurant_category')->insert(['restaurant_id'=>4,'category_id'=>3]);
//
//        DB::table('restaurant_category')->insert(['restaurant_id'=>5,'category_id'=>6]);
    }
}
