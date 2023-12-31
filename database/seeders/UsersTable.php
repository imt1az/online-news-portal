<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersTable extends Seeder
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
        'name' => 'Admin',
        'username' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('111'),
        'role' => 'admin',
        'status' => 'active'
        ],
        [
        'name' => 'User',
        'username' => 'user',
        'email' => 'user@gmail.com',
        'password' => Hash::make('111'),
        'role' => 'user',
        'status' => 'active'
        ],

     ]);
    }
}
