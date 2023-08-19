<?php

namespace SandaliaApps\LaraStarter\database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name'=> 'Admin',
            'slug' => 'admin'
        ]);

        DB::table('roles')->insert([
            'name'=> 'Manager',
            'slug' => 'manager'
        ]);

        DB::table('roles')->insert([
            'name'=> 'Customer',
            'slug' => 'customer'
        ]);
    }
}
