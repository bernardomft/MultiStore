<?php

namespace App\DataFixtures;

use App\Entity\Keyboard;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class KeyboardFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<10;$i++){
            $keyboard = new Keyboard();
            $keyboard->setType("Mecánico");
            $keyboard->setType2("Gamming");
            $keyboard->setConnector("Inalámbrico");
            $keyboard->setIdSubcategory($this->getReference(SubCategoryFixtures::PERIFERICS[0]));
            $keyboard->setIdProduct($this->getReference('Periferico_Teclado_'. $i));
            $manager->persist($keyboard);
            $manager->flush();
        }
    }

    public function getDependencies()
    {
        return [
            SubCategoryFixtures::class,
            ProductFixtures::class
        ];
    }
}
