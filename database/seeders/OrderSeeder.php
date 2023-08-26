<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'status' => 'منفذ',
            'restaurant_id'=>'2',
            'note'=>'شاورما مع مخلل',
            'quantity'=>'2'
        ]);
        Order::create([
            'status' => 'غير منفذ',
            'restaurant_id'=>'2',
            'note'=>' بروستد',
            'quantity'=>'1'
        ]);
        Order::create([
            'status' => 'غير منفذ',
            'restaurant_id'=>'2',
            'note'=>'كرسبي مع سلطة',
            'quantity'=>'3'
        ]);
    }
}
