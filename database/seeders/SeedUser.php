<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SeedUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'abeer',
            'email' => 'abeer@gmail.com',
            'password' => Hash::make('123456789'),
            'phone'=>'0111'
        ]);
        User::create([
            'name' => 'ghadeer',
            'email' => 'ghadeer@gmail.com',
            'password' => Hash::make('123456789'),
            'phone'=>'0222'
        ]);
        User::create([
            'name' => 'tamador',
            'email' => 'tamador@gmail.com',
            'password' => Hash::make('123456789'),
            'phone'=>'0333'
        ]);
    }
}
