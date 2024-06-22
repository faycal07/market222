<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Compagne;
use App\Models\User;

class CompagneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assurez-vous qu'il y a suffisamment d'utilisateurs dans la base de données
        $users = User::all();

        // Si aucun utilisateur n'est trouvé, créez-en un
        if ($users->isEmpty()) {
            $users = User::factory()->count(1)->create();
        }

        // Créez 8 campagnes
        $compagnes = [
            [
                'title' => 'Campagne Eau Minérale TOUDJA',
                'slogan' => 'Purifiez votre vie avec TOUDJA',
                'text_compagne' => 'Découvrez l\'eau minérale la plus pure de la région de Bejaia.',

                'image' => 'images/toudja.jpg',
                'date_limite' => now()->addMonths(3),
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'Campagne Boisson aux Fruits',
                'slogan' => 'Une explosion de saveurs',
                'text_compagne' => 'Goûtez à la fraîcheur des fruits dans chaque gorgée.',

                'image' => 'images/boisson_fruits.jpg',
                'date_limite' => now()->addMonths(3),
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'Campagne Nectar de Fruits',
                'slogan' => 'Le meilleur des fruits, en un nectar',
                'text_compagne' => 'Profitez du goût authentique des fruits avec notre nectar.',

                'image' => 'images/nectar.jpg',
                'date_limite' => now()->addMonths(3),
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'Campagne Nectar d\'Orange',
                'slogan' => 'Le goût naturel de l\'orange',
                'text_compagne' => 'Un nectar d\'orange rafraîchissant et naturel.',

                'image' => 'images/nectar_orange.jpg',
                'date_limite' => now()->addMonths(3),
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'Campagne Boisson en Boîte',
                'slogan' => 'Pratique et délicieux',
                'text_compagne' => 'Emportez nos boissons aux fruits partout avec vous.',

                'image' => 'images/boisson_boite.jpg',
                'date_limite' => now()->addMonths(3),
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'Campagne Nectar d\'Abricot',
                'slogan' => 'Le goût de l\'abricot pur',
                'text_compagne' => 'Savourez la douceur du nectar d\'abricot.',

                'image' => 'images/nectar_abricot.jpg',
                'date_limite' => now()->addMonths(3),
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'Campagne Cocktail de Fruits',
                'slogan' => 'Un mélange savoureux',
                'text_compagne' => 'Dégustez notre cocktail de fruits pour une expérience unique.',

                'image' => 'images/cocktail.jpg',
                'date_limite' => now()->addMonths(3),
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'Campagne Soda Gazeux',
                'slogan' => 'La fraîcheur pétillante',
                'text_compagne' => 'Rafraîchissez-vous avec nos sodas gazeux.',

                'image' => 'images/soda.jpg',
                'date_limite' => now()->addMonths(3),
                'user_id' => $users->random()->id,
            ],
        ];

        foreach ($compagnes as $compagne) {
            Compagne::create($compagne);
        }
    }
}
