<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'Company One',
            'email' => 'contact@companyone.com',
            'logo' => null, // You can set a default logo or leave it as null
            'website' => 'http://companyone.com',
        ]);

        Company::create([
            'name' => 'Company Two',
            'email' => 'contact@companytwo.com',
            'logo' => null,
            'website' => 'http://companytwo.com',
        ]);

        Company::create([
            'name' => 'Company Three',
            'email' => 'contact@companythree.com',
            'logo' => null,
            'website' => 'http://companythree.com',
        ]);
    }
}
