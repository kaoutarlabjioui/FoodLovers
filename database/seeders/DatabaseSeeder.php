<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // DB::table('categories')->insert([
        //     [
        //         'title' => 'Plats principaux',
        //         'description' => 'Des plats consistants pour satisfaire tous les appétits.',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'title' => 'Desserts',
        //         'description' => 'Des douceurs pour finir le repas en beauté.',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'title' => 'Entrées',
        //         'description' => 'Pour commencer votre repas en légèreté.',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);

        // DB::table('tags')->insert([
        //     [
        //         'nom' => 'Végétarien',
        //         'description' => 'Des plats sans viande pour les amateurs de légumes.',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'nom' => 'Épicé',
        //         'description' => 'Pour les amateurs de plats épicés et relevés.',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'nom' => 'Vegan',
        //         'description' => 'Des plats entièrement sans produits d\'origine animale.',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);



        // DB::table('ingredients')->insert([
        //     [
        //         'ingredient' => 'Tomate',
        //         'etat' => 'Frais',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'ingredient' => 'Poulet',
        //         'etat' => 'Cuit',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'ingredient' => 'Lait',
        //         'etat' => 'Liquide',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'ingredient' => 'Farine',
        //         'etat' => 'Sec',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);

        DB::table('produits')->insert([
            [
                'nom' => 'Chocolat Noir 70%',
                'description' => 'Une tablette de chocolat noir avec 70% de cacao, intense et fondante. Parfait pour les amateurs de chocolat.',
                'prix' => 25.99,
                'stock' => 100,
                'photo' => 'chocolat_noir_70.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Pâtes Italiennes',
                'description' => 'Pâtes artisanales en provenance d\'Italie, faites à partir de blé dur de qualité supérieure.',
                'prix' => 12.50,
                'stock' => 200,
                'photo' => 'pates_italiennes.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Sauce Tomate Maison',
                'description' => 'Sauce tomate faite maison avec des tomates fraîches, idéale pour accompagner vos plats de pâtes.',
                'prix' => 15.75,
                'stock' => 150,
                'photo' => 'sauce_tomate_maison.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Fromage Parmesan Râpé',
                'description' => 'Fromage parmesan râpé, parfait pour ajouter une touche de saveur à vos pâtes et gratins.',
                'prix' => 18.30,
                'stock' => 250,
                'photo' => 'fromage_parmesan_rape.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Huile d\'Olive Extra Vierge',
                'description' => 'Huile d\'olive extra vierge de qualité supérieure, idéale pour les salades et les plats méditerranéens.',
                'prix' => 22.10,
                'stock' => 80,
                'photo' => 'huile_olive_extra.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }

}
