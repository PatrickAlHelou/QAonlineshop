<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Ali',
            'last_name' => 'Chamsedine',
            'username' => 'alichamsedine',
            'email' => 'ali@gmail.com',
            'phone_number' => '71651156',
            'isAdmin' => 1,
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Cristiano',
            'last_name' => 'Ronaldo',
            'username' => 'ronaldo7',
            'email' => 'ronaldo@gmail.com',
            'phone_number' => '03112233',
            'isAdmin' => 0,
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Lionel',
            'last_name' => 'Messi',
            'username' => 'messi10',
            'email' => 'messi@gmail.com',
            'phone_number' => '03445566',
            'isAdmin' => 0,
            'password' => Hash::make('12345678'),
        ]);
    }
}
