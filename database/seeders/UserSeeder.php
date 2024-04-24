<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' =>  'Admin',
                'mobile_no' => '9876543210',
                'city' => 'Puducherry',
                'state' => 'Puducherry',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ],
        ]);
    }
}
