<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $userDataArray = [
            [
                'lastname' => 'Eau',
                'firstname' => 'Tarie',
                'email' => 'eautarie@example.com',
                'username' => 'Eau Tarie',
                'passsword' => 'eautarie',
                'role' => 'ROLE_ADMIN',
            ],
            [
                'lastname' => 'Doe',
                'firstname' => 'John',
                'email' => 'johndoe@example.com',
                'password' => 'johndoepassword',
                'username' => 'The King John Doe',
                'role' => 'ROLE_USER',
            ],
            [
                'lastname' => 'Seal',
                'firstname' => 'IconValley',
                'email' => 'sealiconvalley@example.com',
                'username' => 'Seal\'IconValley',
                'password' => 'sealiconvalley',
                'role' => 'ROLE_ADMIN',
            ],
            [
                'lastname' => 'Eau',
                'firstname' => 'Lympique',
                'email' => 'eaulympique@example.com',
                'username' => 'eaulympique',
                'password' => 'eaulympique',
                'role' => 'ROLE_USER',
            ],
            [
                'lastname' => 'Eau',
                'firstname' => 'But',
                'email' => 'eaubut@example.com',
                'username' => 'eaubut',
                'password' => 'eaubut',
                'role' => 'ROLE_USER',
            ]
        ];

        $teamDataArray = [
            [
                'name' => 'la team des meilleurs',
                'slogan' => 'aller droit au but !',
                'description' => 'c\'est la team des meilleurs qui iront droit au but',
            ],
            [
                'name' => 'les pelottes de laines',
                'slogan' => 'venez jouer avec nos pelotes de laine',
                'description' => 'On est la team des CHEH qui jouent avec les pelotes de laines',
            ],
            [
                'name' => 'Les Strikers du Babyfoot',
                'slogan' => 'Frappez fort, gagnez grand !',
                'description' => 'Une équipe de babyfoot déterminée à marquer des buts et à remporter la victoire.',
            ],
            [
                'name' => 'Les Rois du Kick',
                'slogan' => 'Dominez le terrain de jeu !',
                'description' => 'Une équipe redoutable de babyfoot prête à régner en maître sur le terrain.',
            ],
            [
                'name' => 'Les Champions de la Tige',
                'slogan' => 'Maîtrisez chaque mouvement !',
                'description' => 'Une équipe experte en contrôle de la tige, prête à faire des passes précises et des tirs imparables.',
            ],
            [
                'name' => 'Les All-Stars du Babyfoot',
                'slogan' => 'Légendes en devenir !',
                'description' => 'Une équipe composée des meilleurs joueurs de babyfoot, prête à briller sur le terrain et à écrire l\'histoire.',
            ],
            [
            'name' => 'Les Glisseurs de Balle',
            'slogan' => 'Naviguez vers la victoire !',
            'description' => 'Une équipe agile et rapide, capable de glisser la balle dans le but adverse avec précision et finesse.',
            ]
        ];

        $shopDataArray = [
            [
                'name' => 'Ballon d\'or',
                'description' => 'Le super ballon d\'or',
                'price' => 13000,
                'condition' => '1000 buts',
            ],
            [
                'name' => 'Ballon d\'argent',
                'description' => 'Le super ballon d\'argent',
                'price' => 5000,
                'condition' => '300 buts',
            ],
            [
                'name' => 'Ballon de bronze',
                'description' => 'Le super ballon de bronze',
                'price' => 300,
                'condition' => '50 buts',
            ],
            [
                'name' => 'Table de Babyfoot Deluxe',
                'description' => 'Une table de babyfoot haut de gamme pour des parties de qualité supérieure.',
                'price' => 15000,
                'condition' => 'Assemblage professionnel requis',
            ],
            [
                'name' => 'Maillot Officiel de l\'Équipe',
                'description' => 'Le maillot officiel de votre équipe favorite, pour jouer avec style et fierté.',
                'price' => 2500,
                'condition' => 'Disponible en plusieurs tailles',
            ],
            [
                'name' => 'Pack de Balles de Babyfoot',
                'description' => 'Un ensemble de balles de babyfoot de haute qualité pour des parties sans interruption.',
                'price' => 50,
                'condition' => 'Lot de 6 balles inclus',
            ],
            [
                'name' => 'Gants de Gardien de But',
                'description' => 'Des gants de gardien de but spécialement conçus pour le babyfoot, pour une défense impeccable.',
                'price' => 1500,
                'condition' => 'Taille unique',
            ],
            [
                'name' => 'Tablette Tactique',
                'description' => 'Une tablette tactique pour élaborer des stratégies gagnantes lors de vos matchs de babyfoot.',
                'price' => 800,
                'condition' => 'Compatible avec toutes les surfaces',
            ],
        ];


        $manager->flush();
    }
}
