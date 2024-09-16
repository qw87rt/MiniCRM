<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Company;

class EmployeeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all company IDs
        $companyIds = Company::pluck('id');

        Employee::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'company_id' => $companyIds->random(), // Assign a random company
            'email' => 'john.doe@companyone.com',
            'phone' => '123-456-7890',
        ]);

        Employee::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'company_id' => $companyIds->random(), // Assign a random company
            'email' => 'jane.smith@companytwo.com',
            'phone' => '234-567-8901',
        ]);

        Employee::create([
            'first_name' => 'Emily',
            'last_name' => 'Johnson',
            'company_id' => $companyIds->random(), // Assign a random company
            'email' => 'emily.johnson@companythree.com',
            'phone' => '345-678-9012',
        ]);
    }
}
