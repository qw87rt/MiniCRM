<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// Make sure to import the seeder classes
use Database\Seeders\CompanySeeder;
use Database\Seeders\EmployeeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the admin user
        User::factory()->create([
            'name' => 'Admin admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        // Seed the companies
        $this->call(CompanySeeder::class);

        // Seed the employees
        $this->call(EmployeeSeeder::class);
    }
}
