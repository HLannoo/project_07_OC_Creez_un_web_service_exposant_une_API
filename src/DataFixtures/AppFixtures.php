<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use App\Entity\Phone;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $dataPhone =
        [
            [
                'brand' => 'Samsung',
                'model' => 'Galaxy A22',
                'price' => 209.00,
                'description' =>
                    'Connectivité 5G - Débit ultra rapide,
                    Ecran panoramique de 90Hz - 6,6",
                    Triple capteurs photo - Ultra grand angle & Mode portrait,
                    Caméra principale haute résolution - 48MP pour des photos nettes,
                    Mémoire extensible via carte SD jusqu’à 1To',
                'color' => 'gris',
                'storage' => '128',
                'size' => 6.40,
                'system' => 'android',
                'weight' => '203',
                'card' => 'nano'
            ],
            [
                'brand' => 'Samsung',
                'model' => 'Galaxy A33',
                'price' => 379.00,
                'description' =>
                    'Ecran 6,4’’Super AMOLED 90Hz - Un immense écran lumineux et très fluide,
                    Quadruple capteur photo et selfie 13MP - Pour changer d’angle de vue et capturer chaque instant,
                    Capteur principal 48MP avec stabilisation optique - Des photos stables et nettes, même en mouvement,
                    Résistant à l’eau et à la poussière (IP67) - Pour être emmené partout avec vous,
                    Batterie 5000 mAh et charge ultra rapide 25W - Une batterie longue durée qui peut être rechargée en un éclair.',
                'color' => 'gold',
                'storage' => '128',
                'size' => 6.38,
                'system' => 'android',
                'weight' => '186',
                'card' => 'nano'
            ],
            [
                'brand' => 'Samsung',
                'model' => 'Galaxy S22',
                'price' => 859.00,
                'description' =>
                    'Le point fort : Capteur Principal de 50MP,
                    Ecran : Dynamic AMOLED 2x de 6.1 pouces,
                    Stockage : 128 Go,
                    Appareil photo : Capteur Principal de 50MP & Zoom Optique X3',
                'color' => 'black',
                'storage' => '128',
                'size' => 6.10,
                'system' => 'android',
                'weight' => '167',
                'card' => 'nano'
            ],
            [
                'brand' => 'Samsung',
                'model' => 'Galaxy S22 Ultra',
                'price' => 1259.00,
                'description' =>
                    "Écran beau et lumineux,
                    Le stylet n'est plus une option,
                    Charge enfin rapide,
                    Photos globalement d'excellente qualité, notamment en 108 Mpx.",
                'color' => 'white',
                'storage' => '256',
                'size' => 6.80,
                'system' => 'android',
                'weight' => '228',
                'card' => 'nano'
            ],
            [
                'brand' => 'Samsung',
                'model' => 'Galaxy Z Fold',
                'price' => 1799.90,
                'description' =>
                    'Deux afficheurs très réussis,
                    Samsung ose la caméra sous écran,
                    Le plein de puissance,
                    La compatibilité S Pen est enfin là,',
                'color' => 'black',
                'storage' => '512',
                'size' => 7.6,
                'system' => 'android',
                'weight' => '271',
                'card' => 'nano'
            ],
            [
                'brand' => 'Xiaomi',
                'model' => 'Redmi 9A',
                'price' => 139.90,
                'description' =>
                    'Écran HD + immersif de 6,53 pouces - Pour vous offrir une expérience vidéo et de jeu incroyable tout en protégeant vos yeux de la lumière bleue de l’écran,
                    Appareil photo incroyable - La caméra arrière de 13MP est optimisée par l’IA pour capturer rapidement et facilement des images nettes et claires dans toutes les situations,
                    Processeur MediaTekHelioG25 - Un processeur octa-core rapide et fiable, optimisé pour offrir des jeux sans interruption et une utilisation quotidienne fluide,
                    Écran ultra fluide 90HZ - Un meilleur confort des yeux grâce à un affichage ultra fluide,
                    Batterie haute capacité de 5000mAh avec une durée de vie plus longue - Pour vous permettre d’en profiter pendant plusieurs heures .',
                'color' => 'grey',
                'storage' => '32',
                'size' => 6.53,
                'system' => 'android',
                'weight' => '182',
                'card' => 'nano'
            ],
            [
                'brand' => 'Xiaomi',
                'model' => '11T',
                'price' => 569.90,
                'description' => 'Le Xiaomi 11T 5G déploie des caractéristiques excellentes et conviendra parfaitement aux utilisateurs à la recherche d’un photophone ambitieux, capable de prendre des photos et des vidéos de qualité professionnelle. Doté d’un bloc triple capteur photo, l’objectif grand angle affiche 108 MP de résolution et sublime tous les souvenirs. Pour assurer ses performances, le Xiaomi 11T possède un processeur MediaTek Dimensity 1200-Ultra, ce qui en fait un portable rapide et puissant. Et qui dit hautes performances dit aussi grande autonomie. Avec sa batterie de 5000 mAh, le Xiaomi 11T est utilisable pendant plus d’une journée et se recharge totalement en à peine une heure.',
                'color' => 'blue',
                'storage' => '128',
                'size' => 6.67,
                'system' => 'android',
                'weight' => '203',
                'card' => 'nano'
            ],
            [
                'brand' => 'Xiaomi',
                'model' => '12 Pro',
                'price' => 1099.00,
                'description' =>
                    'Triple capteur photo : un grand-angle de 50 mégapixels, un ultra grand-angle de 50 mégapixels et un capteur téléobjectif avec zoom optique x2 de 50 mégapixels,
                    Ecran AMOLED de 6,73 pouces rafraîchi à 120 Hz adaptatif,
                    SoC Qualcomm Snapdragon 8 Gen1 et jusquà 12 Go de RAM ainsi que jusquà 256 Go de stockage,
                    Batterie de 4600 mAh compatible charge rapide (120 W), charge sans fil (50 W) et inversée (10 W)',
                'color' => 'purple',
                'storage' => '256',
                'size' => 6.73,
                'system' => 'android',
                'weight' => '207',
                'card' => 'nano'
            ],[
                'brand' => 'Apple',
                'model' => 'iPhone 11',
                'price' => 539.00,
                'description' =>
                    "Les bonnes finitions,
                    L'écran bien calibré,
                    La qualité des photos,
                    Les excellentes performances,
                    L'autonomie.",
                'color' => 'black',
                'storage' => '64',
                'size' => 6.10,
                'system' => 'iOS',
                'weight' => '194',
                'card' => 'nano'
        ],
            [
                'brand' => 'Apple',
                'model' => 'iPhone 12',
                'price' => 799.00,
                'description' =>
                    "Écran Oled parfaitement calibré,
                    Excellentes photos de jour,
                    Autonomie correcte,
                    Excellentes performances,
                    Finitions exemplaires.,
                    Compatible 5G,
                    Certifié IP68.",
                'color' => 'white',
                'storage' => '256',
                'size' => 6.10,
                'system' => 'iOS',
                'weight' => '162',
                'card' => 'nano'
            ],
            [
                'brand' => 'Apple',
                'model' => 'iPhone 13',
                'price' => 1249.00,
                'description' =>
                    "Écran lumineux et très bien calibré,
                    Performances de haute volée,
                    Autonomie très supérieure à celle de l'iPhone 12,
                    Finitions au top.",
                'color' => 'grey',
                'storage' => '512',
                'size' => 6.10,
                'system' => 'iOS',
                'weight' => '173',
                'card' => 'nano'
            ]
        ];
    private $dataCustomer =
        [
            ['name'=> 'Amazon'],
            ['name' => 'Cdiscount'],
            ['name' => 'Rakuten'],
            ['name' => 'Fnac'],
            ['name' => 'Darty'],
            ['name' => 'Boulanger'],
            ['name' => 'Auchant'],
            ['name' => 'SFR'],
            ['name' => 'Orange'],
            ['name' => 'Free'],
            ['name' => 'Bouygues']
            ]
    ;
    private UserPasswordHasherInterface $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        foreach ($this->dataCustomer as $row){
            $customer = new Customer();
            $customer->setName($row['name']);

            $manager->persist($customer);

            for ($i = 0; $i < 10; $i++) {
                $user = new User();
                $hashedPassword = $this->passwordHasher->hashPassword(
                    $user,
                    "password"
                );
                $user->setFirstName($faker->firstName)
                    ->setLastName($faker->lastName)
                    ->setEmail($faker->email)
                    ->setPassword($hashedPassword)
                    ->setRoles(["ROLE_USER"])
                    ->setCustomer($customer);

                $manager->persist($user);
            }
            for ($u = 0; $u < 1; $u++) {
                $user = new User();
                $hashedPassword = $this->passwordHasher->hashPassword(
                    $user,
                    "password"
                );
                $user->setFirstName($faker->firstName)
                    ->setLastName($faker->lastName)
                    ->setEmail($faker->email)
                    ->setPassword($hashedPassword)
                    ->setRoles(["ROLE_ADMIN"])
                    ->setCustomer($customer);

                $manager->persist($user);
            }
        }
        for ($l = 0; $l < 1; $l++) {
            $user = new User();
            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                "password"
            );
            $user->setFirstName('SUPER')
                ->setLastName('ADMIN')
                ->setEmail('superadmin@gmail.com')
                ->setPassword($hashedPassword)
                ->setRoles(["ROLE_SUPER_ADMIN"]);

            $manager->persist($user);
        }
        foreach ($this->dataPhone as $row){
            $phone = new Phone();
            $phone->setName($row['model'])
                ->setDescription($row['description'])
                ->setBrand($row['brand'])
                ->setPrice($row['price'])
                ->setSize($row['size'])
                ->setWeight($row['weight'])
                ->setColor($row['color'])
                ->setStorage($row['storage'])
                ->setCard($row['card'])
                ->setSystem($row['system'])
                ->setImage($faker->image);

                $manager->persist($phone);

        }

        $manager->flush();
    }
}
