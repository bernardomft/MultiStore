<?php

namespace App\DataFixtures;

use App\Entity\Category;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CategoryFixtures extends Fixture
{
    public const NAMES = ['Ordenadores', 'Perifericos', 'Smartphones', 'Tablets', 'Accesorios',
                            'Gadgets'];
    public const IMAGES = ['desktops.png' , 'periferics.jpg',
                        'smartphones.jpg','tablets.jpg' , 'accesories.webp', 'gadgets.jpg'];
    
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < sizeof(self::NAMES); $i++ ){
            $category = new Category();
            $category->setName(self::NAMES[$i]);
            $category->setDesciption('Descripcion de ' . self::NAMES[$i]);
            $category->setImage(self::IMAGES[$i]);
            $manager->persist($category);
            $manager->flush();
            $this->addReference(self::NAMES[$i], $category);
        }
        

        
    }
}
