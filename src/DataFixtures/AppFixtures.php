<?php

namespace App\DataFixtures;


use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;


class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    /**
     * @throws \Exception
     */
    public function load(ObjectManager $manager): void
    {


        for ($nbAuthor = 0; $nbAuthor < 6; $nbAuthor++) {
            $authors = new Author();
            $authors->setFirstname($this->faker->firstName())
                ->setLastname($this->faker->lastName());
            $manager->persist($authors);

            for ($nbBook = 0; $nbBook < 4; $nbBook++) {
                $books = new Book();
                $books->setTitle($this->faker->sentence(3))
                    ->setDescription($this->faker->paragraph(4))
                    ->setPrice($this->faker->numberBetween(9, 75))
                    ->setYear($this->faker->numberBetween(1925, 2021))
                    ->setAuthor($authors);
                $manager->persist($books);
            }
        }



        $manager->flush();

        }

}




