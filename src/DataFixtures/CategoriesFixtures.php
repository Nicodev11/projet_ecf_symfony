<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{

    public function __construct(private SluggerInterface $slugger) {}
    
        public function load(ObjectManager $manager): void
    {
        $parent = $this->createCategory('Entrées', null, $manager);
        $parent = $this->createCategory('PLats', null, $manager);
        $parent = $this->createCategory('Desserts', null, $manager);
        $parent = $this->createCategory('Boissons', null, $manager);
        $parent = $this->createCategory('Menus', null, $manager);

        $manager->flush();
    }

    public function createCategory(string $name, Categories $parent = null, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name);
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($parent);
        $manager->persist($category);

        return $category;
    }
}