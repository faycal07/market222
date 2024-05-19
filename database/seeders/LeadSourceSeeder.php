<?php

namespace Database\Seeders;

use App\Models\LeadSource;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LeadSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LeadSource::create(['name' => 'Email']);
        LeadSource::create(['name' => 'Phone']);
        LeadSource::create(['name' => 'Web']);
        LeadSource::create(['name' => 'Direct']);
        LeadSource::create(['name' => 'Formulaire']);
    }
}
