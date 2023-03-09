<?php

namespace App\DataFixtures;

use App\Entity\RestaurantHours;
use DateTimeInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use phpDocumentor\Reflection\Types\Integer;

class RestaurantHoursFixtures extends Fixture
{

    public function __construct() {}
    
        public function load(ObjectManager $manager): void
    {
        $this->createCategory('Lundi',  15, 15, $manager);
        $this->createCategory('Mardi',  15, 15, $manager);
        $this->createCategory('Mercredi',  15, 15, $manager);
        $this->createCategory('Jeudi',  15, 15, $manager);
        $this->createCategory('Vendredi',  15, 15, $manager);
        $this->createCategory('Samedi',  15, 15, $manager);
        $this->createCategory('Dimanche',  15, 15, $manager);

        $manager->flush();
    }

    public function createCategory(string $day, int $placesLunch, int $placesDinner, ObjectManager $manager)
    {

        $category = new RestaurantHours();

        $category->setday($day);
        $category->setOpeningLunch(new \DateTime());
        $category->setClosingLunch(new \DateTime());
        $category->setOpeningDinner(new \DateTime());
        $category->setClosingDinner(new \DateTime());
        $category->setPlacesAvailableLunch($placesLunch);
        $category->setPlacesAvailableDinner($placesDinner);
        $manager->persist($category);

        return $category;
    }
}
