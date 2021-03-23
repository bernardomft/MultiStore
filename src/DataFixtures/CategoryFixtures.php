<?php

namespace App\DataFixtures;

use App\Entity\Category;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const NAMES = ['Ordenadores', 'Periféricos', 'Componentes', 'Smartphones', 'Tablets', 'Accesorios',
                            'Gadgets'];
    
    public function load(ObjectManager $manager)
    {
        foreach(self::NAMES as $n ){
            $category = new Category();
            $category->setName($n);
            $category->setDesciption('Descripcion de ' . $n);
            $manager->persist($category);
            $manager->flush();
            $this->addReference($n, $category);
        }
        

        
    }
}
