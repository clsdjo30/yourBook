<?php

namespace App\DataFixtures;



use App\Entity\Comment;
use App\Entity\Conference;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class ConferenceFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private Generator $faker;
    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager):void
    {
        $conference = new Conference();
        $conference->setCity('Nîmes')
            ->setYear('2022')
            ->setIsInternational('true');

        $comments = new Comment();
        $comments->setAuthor('Paul')
            ->setEmail('paul@gmail.com')
            ->setText('Super organisation, et les conference etainet top')
            ->setCreatedAt(\DateTimeImmutable::createFromMutable($this->faker->dateTime));

        $comments->setConference($conference);

        $comments1 = new Comment();
        $comments1->setAuthor('Richard')
            ->setEmail('richar@gmail.com')
            ->setText('pas tres bien organise, et les conference etainet top')
            ->setCreatedAt(\DateTimeImmutable::createFromMutable($this->faker->dateTime));

        $comments1->setConference($conference);

        $manager->persist($conference);
        $manager->persist($comments);
        $manager->persist($comments1);
        $manager->flush();
    }
}
