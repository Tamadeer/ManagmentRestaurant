<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'region' => 'altal',
            'city'=>'alwade'
        ]);
        Address::create([
            'region' => 'altal',
            'city'=>'wadehnonh'
        ]);
        Address::create([
            'region' => 'altal',
            'city'=>'bedralsoltany'
        ]);
        Address::create([
            'region' => 'altal',
            'city'=>'dwaralnakhlh'
        ]);
    }
}
