<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    private $counter = 1;

    public function __construct(private SluggerInterface $slugger) {}
    
        public function load(ObjectManager $manager): void
    {
        $parent = $this->createCategory('Entrée', null, $manager);
        $parent = $this->createCategory('Plat', null, $manager);
        $parent = $this->createCategory('Dessert', null, $manager);
        $parent = $this->createCategory('Boisson', null, $manager);
        $parent = $this->createCategory('Menu', null, $manager);

        $manager->flush();
    }

    public function createCategory(string $name, Categories $parent = null, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name);
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($parent);
        $manager->persist($category);

        $this->addReference('cat-'.$this->counter, $category);
        $this->counter++;

        return $category;
    }
}
