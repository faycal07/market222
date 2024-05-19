<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insérer les types de plomb existants
        DB::table('lead_types')->insert([
            ['nom' => 'existant business'],
            ['nom' => 'nouveau business'],
        ]);
    }
}
