<?php

namespace App\DataFixtures;

use App\Entity\Menus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MenusFixtures extends Fixture
{
    
        public function load(ObjectManager $manager): void
    {
        
    }

    public function createMenu(string $name,float $price, ObjectManager $manager)
    {
        //$menu = new Menus();
        //$menu->setName($name);
        //$menu->setPrice($price);
        //$manager->persist($menu);
//
        //return $menu;
    }
}
