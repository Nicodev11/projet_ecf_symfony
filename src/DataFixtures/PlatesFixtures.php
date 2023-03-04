<?php

namespace App\DataFixtures;

use App\Entity\Plates;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class PlatesFixtures extends Fixture
{

    public function __construct(private SluggerInterface $slugger) {}

    public function load(ObjectManager $manager): void
    {
        $plates = new Plates();
        $plates->setName('Pates en sauces');
        $plates->setDescription('Une belle description');
        $plates->setPrice(14);
        $category = $this->getReference('cat-'.rand(1, 5));
        $plates->setCategories($category);
        $manager->persist($plates);
        $manager->flush();
    }
}
