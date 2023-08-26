<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Couponeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'name' => 'نصف السعر',
            'code' => '5555',
            'rabat_type' => 'بالمية',
            'rabat_value' => '20%',
            'valid_from' => '2000',
            'valid_for' => '1800',
            'status' => '1',
            'restaurant_id' => '1',
        ]);
        Coupon::create([
            'name' => 'نصف السعر',
            'code' => '5555',
            'rabat_type' => 'بالمية',
            'rabat_value' => '20%',
            'valid_from' => '2000',
            'valid_for' => '1800',
            'status' => '1',
            'restaurant_id' => '1',
        ]);
    }
}
