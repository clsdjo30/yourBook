<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $book = new Book();


        $book->setTitle('Les Rivières Pourpres')
            ->setAuthor('Granger')
            ->setPrice(15.50)
            ->setYear(1997);



        $manager->persist($book);
        $manager->flush();
    }
}
