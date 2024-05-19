<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stage;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stages = [
            [
                'code' => 'new',
                'nom' => 'New',
                'sort' => 1,
                'probabilite' => 10,
            ],
            [
                'code' => 'follow-up',
                'nom' => 'Follow-Up',
                'sort' => 2,
                'probabilite' => 20,
            ],
            [
                'code' => 'lead',
                'nom' => 'Lead',
                'sort' => 3,
                'probabilite' => 50,
            ],
            [
                'code' => 'negotiation',
                'nom' => 'Negotiation',
                'sort' => 4,
                'probabilite' => 70,
            ],
            [
                'code' => 'won',
                'nom' => 'Won',
                'sort' => 5,
                'probabilite' => 100,
            ],
            [
                'code' => 'lost',
                'nom' => 'Lost',
                'sort' => 6,
                'probabilite' => 0,
            ],
            [
                'code' => 'qualified-lead',
                'nom' => 'Qualified Lead',
                'sort' => 7,
                'probabilite' => 90,
            ],
            [
                'code' => 'proposal-sent',
                'nom' => 'Proposal Sent',
                'sort' => 8,
                'probabilite' => 80,
            ],
        ];


        foreach ($stages as $stage) {
            Stage::create($stage);
        }
    }
}
