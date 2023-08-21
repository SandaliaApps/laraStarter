<?php

namespace SandaliaApps\LaraStarter\database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // if you want to seed only Roles then just comment `UsersTableSeeder::class`
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        // Run this command (without curly braces) to seed db {php artisan db:seed --class="SandaliaApps\\LaraStarter\\Database\\Seeders\\DatabaseSeeder"}
    }
}
