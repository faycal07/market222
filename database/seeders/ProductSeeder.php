<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Eau minérale TOUDJA
        Product::create([
            'sku' => 'TOUDJA001',
            'nom' => 'Eau minérale TOUDJA 0.50 Cl',
            'description' => 'Eau minérale TOUDJA, 0.50 Cl, marque distribuée principalement dans la région de Bejaia.',
            'quantite' => 78048,
            'prix' => 70,
        ]);

        // Boissons et jus de fruits
        Product::create([
            'sku' => 'BOISSON001',
            'nom' => 'Boisson aux fruits 1.25L',
            'description' => 'Boisson aux fruits, gamme de 1.25L, distribution régulière dans le centre et l’est du pays.',
            'quantite' => 78097,
            'prix' => 120,
        ]);

        // Nectars de fruits carton 2L
        Product::create([
            'sku' => 'NECTAR001',
            'nom' => 'Nectar de fruits en carton 2L',
            'description' => 'Nectar de fruits en carton, 2L.',
            'quantite' => 98746,
            'prix' => 180,
        ]);

        // Nectar d'orange
        Product::create([
            'sku' => 'NECTAR002',
            'nom' => 'Nectar d\'orange',
            'description' => 'Nectar d\'orange, boissons à base du concentré d\'orange pulpeux.',
            'quantite' => 27664,
            'prix' => 130,
        ]);

          // Boissons aux fruits en boite carton 1 L
          Product::create([
            'sku' => 'BOISSON002',
            'nom' => 'Boisson aux fruits en boîte carton 1 L',
            'description' => 'Boisson aux fruits en boîte carton, 1 L.',
            'quantite' => 26526,
            'prix' => 80,
        ]);

        // Nectar d'abricot
        Product::create([
            'sku' => 'NECTAR003',
            'nom' => 'Nectar d\'abricot',
            'description' => 'Nectar d\'abricot, boisson rafraîchissante et savoureuse élaborée à base du nectar d\'abricot algérien des Aurès.',
            'quantite' => 15748,
            'prix' => 160,
        ]);

        // Cocktail pêche orange abricot cocktail de fruit
         Product::create([
          'sku' => 'COCKTAIL001',
          'nom' => 'Cocktail pêche orange abricot',
          'description' => 'Cocktail de fruits à base de pêche, orange et abricot.',
          'quantite' => 15460,
          'prix' => 170,
          ]);

          // Soda boissons gazeuses
          Product::create([
          'sku' => 'SODA001',
          'nom' => 'Soda boissons gazeuses',
          'description' => 'Boissons gazeuses avec plusieurs parfums, différentes gammes disponibles en 1 L, 2 L et 33 Cl.',
          'quantite' =>  12530,
          'prix' => 150,
         ]);
         // Cocktail méditerranéen
         Product::create([
         'sku' => 'COCKTAIL002',
         'nom' => 'Cocktail méditerranéen',
         'description' => 'Boisson à base d’une sélection des fruits de la méditerranée, plus généreux en vitamines.',
         'quantite' => 78595,
         'prix' => 160,
]);
    }
}
