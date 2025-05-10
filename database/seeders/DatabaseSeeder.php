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
                'nom' => 'Spatule en Bois',
                'description' => 'Spatule en bois naturel, idéale pour cuisiner sans rayer vos poêles et casseroles antiadhésives.',
                'prix' => 7.50,
                'stock' => 150,
                'photo' => 'spatule_bois.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Couteau de Chef 20cm',
                'description' => 'Couteau de chef en acier inoxydable, parfaitement équilibré pour couper légumes, viandes et poissons.',
                'prix' => 39.99,
                'stock' => 75,
                'photo' => 'couteau_chef.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Planche à Découper en Bambou',
                'description' => 'Planche solide et résistante en bambou, hygiénique et écologique pour toutes vos préparations.',
                'prix' => 18.00,
                'stock' => 100,
                'photo' => 'planche_bambou.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Fouet en Acier Inoxydable',
                'description' => 'Fouet robuste en acier inox, idéal pour monter des blancs en neige ou mélanger vos préparations.',
                'prix' => 9.80,
                'stock' => 130,
                'photo' => 'fouet_inox.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Poêle Antiadhésive 28cm',
                'description' => 'Poêle avec revêtement antiadhésif sans PFOA, compatible tous feux dont induction.',
                'prix' => 45.00,
                'stock' => 60,
                'photo' => 'poele_antiadhesive.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }

}
