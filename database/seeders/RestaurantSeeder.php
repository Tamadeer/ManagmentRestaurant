<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::create([
            'name' => 'المميز',
        ]);
        Restaurant::create([
            'name' => 'المجلي',
        ]);
        Restaurant::create([
            'name' => 'ابو عبدو',
        ]);
        Restaurant::create([
            'name' => 'الشالط',
        ]);
        Restaurant::create([
            'name' => 'الكنغ',
        ]);
    }
}
