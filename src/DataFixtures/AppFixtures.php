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
    private $data =
        [
            [
                'brand' => 'Samsung',
                'model' => 'S11',
                'price' => 879.90,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo eveniet quo repellendus, deserunt iste facilis rem saepe quaerat natus perferendis obcaecati veniam soluta quisquam, est pariatur recusandae. Dolorem, laudantium dignissimos.'
            ],
            [
                'brand' => 'Samsung',
                'model' => 'S11',
                'price' => 899.90,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo eveniet quo repellendus, deserunt iste facilis rem saepe quaerat natus perferendis obcaecati veniam soluta quisquam, est pariatur recusandae. Dolorem, laudantium dignissimos.'
            ],
            [
                'brand' => 'Samsung',
                'model' => 'S11+',
                'price' => 999.90,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo eveniet quo repellendus, deserunt iste facilis rem saepe quaerat natus perferendis obcaecati veniam soluta quisquam, est pariatur recusandae. Dolorem, laudantium dignissimos.'
            ],
            [
                'brand' => 'Samsung',
                'model' => 'S12+',
                'price' => 1049.90,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo eveniet quo repellendus, deserunt iste facilis rem saepe quaerat natus perferendis obcaecati veniam soluta quisquam, est pariatur recusandae. Dolorem, laudantium dignissimos.'
            ],
            [
                'brand' => 'Samsung',
                'model' => 'Note 11',
                'price' => 1290.90,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo eveniet quo repellendus, deserunt iste facilis rem saepe quaerat natus perferendis obcaecati veniam soluta quisquam, est pariatur recusandae. Dolorem, laudantium dignissimos.'
            ],
            [
                'brand' => 'Xiaomi',
                'model' => 'Redmi Note 8',
                'price' => 179.90,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo eveniet quo repellendus, deserunt iste facilis rem saepe quaerat natus perferendis obcaecati veniam soluta quisquam, est pariatur recusandae. Dolorem, laudantium dignissimos.'
            ],
            [
                'brand' => 'Xiaomi',
                'model' => 'Redmi Note 8 Pro',
                'price' => 209.90,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo eveniet quo repellendus, deserunt iste facilis rem saepe quaerat natus perferendis obcaecati veniam soluta quisquam, est pariatur recusandae. Dolorem, laudantium dignissimos.'
            ],
            [
                'brand' => 'Xiaomi',
                'model' => 'Mi 10',
                'price' => 550.00,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo eveniet quo repellendus, deserunt iste facilis rem saepe quaerat natus perferendis obcaecati veniam soluta quisquam, est pariatur recusandae. Dolorem, laudantium dignissimos.'
            ],[
            'brand' => 'Xiaomi',
            'model' => 'Mi 10T Pro',
            'price' => 359.90,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo eveniet quo repellendus, deserunt iste facilis rem saepe quaerat natus perferendis obcaecati veniam soluta quisquam, est pariatur recusandae. Dolorem, laudantium dignissimos.'
        ],
            [
                'brand' => 'Xiaomi',
                'model' => 'Mi 10 Light',
                'price' => 279.90,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo eveniet quo repellendus, deserunt iste facilis rem saepe quaerat natus perferendis obcaecati veniam soluta quisquam, est pariatur recusandae. Dolorem, laudantium dignissimos.'
            ],
            [
                'brand' => 'Iphone',
                'model' => 'X',
                'price' => 1179.90,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo eveniet quo repellendus, deserunt iste facilis rem saepe quaerat natus perferendis obcaecati veniam soluta quisquam, est pariatur recusandae. Dolorem, laudantium dignissimos.'
            ]
        ];
    private UserPasswordHasherInterface $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($c = 0; $c < 5; $c++) {
            $customer = new Customer();
            $customer->setName($faker->company);

            $manager->persist($customer);

            for ($i = 0; $i < 30; $i++) {
                $user = new User();
                $hashedPassword = $this->passwordHasher->hashPassword(
                    $user,
                    $faker->password
                );
                $user->setFirstName($faker->firstName)
                    ->setLastName($faker->lastName)
                    ->setEmail($faker->email)
                    ->setPassword($hashedPassword)
                    ->setRoles(["ROLE_USER"])
                    ->setCustomer($customer);

                $manager->persist($user);
            }
        }
        foreach ($this->data as $row){
            $phone = new Phone();
            $phone->setName($row['model'])
                ->setDescription($row['description'])
                ->setBrand($row['brand'])
                ->setPrice($row['price']);

                $manager->persist($phone);

        }

        $manager->flush();
    }
}
