<?php

namespace App\DataFixtures;

use App\Entity\RestaurantHours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class RestaurantHoursFixtures extends Fixture
{

    public function __construct() {}
    
        public function load(ObjectManager $manager): void
    {
        $this->createCategory('Lundi', $manager);
        $this->createCategory('Mardi',  $manager);
        $this->createCategory('Mercredi',  $manager);
        $this->createCategory('Jeudi',  $manager);
        $this->createCategory('Vendredi', $manager);
        $this->createCategory('Samedi',  $manager);
        $this->createCategory('Dimanche',   $manager);

        $manager->flush();
    }

    public function createCategory(string $day, ObjectManager $manager)
    {

        $category = new RestaurantHours();

        $category->setday($day);
        $category->setOpeningLunch(new \DateTime());
        $category->setClosingLunch(new \DateTime());
        $category->setOpeningDinner(new \DateTime());
        $category->setClosingDinner(new \DateTime());
        $manager->persist($category);

        return $category;
    }
}
