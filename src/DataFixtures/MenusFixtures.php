<?php

namespace App\DataFixtures;

use App\Entity\Menus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;



class MenusFixtures extends Fixture
{
    private $counter = 1;

    public function __construct() {}
    
        public function load(ObjectManager $manager): void
    {
        $this->createCategory('menu du jour',  $manager);
        $this->createCategory('Menu du soir',  $manager);

        $manager->flush();
    }

    public function createCategory(string $name, ObjectManager $manager)
    {
        $menu = new Menus();
        $menu->setName($name);
        $manager->persist($menu);

        $this->addReference('cat-'.$this->counter, $menu);
        $this->counter++;

        return $menu;
    }
}
