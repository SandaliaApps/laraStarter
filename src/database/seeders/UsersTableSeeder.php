<?php

namespace SandaliaApps\LaraStarter\database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'name'=> 'Md. Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name'=> 'Md. Manager',
            'username' => 'manager',
            'email' => 'manager@manager.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'role_id' => 3,
            'name'=> 'Md. Customer',
            'username' => 'customer',
            'email' => 'customer@customer.com',
            'password' => Hash::make('password'),
        ]);
    }
}
