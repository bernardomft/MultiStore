<?php

namespace App\DataFixtures;

use App\Entity\Mouse;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MouseFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<10;$i++){
            $mouse = new Mouse();
            $mouse->setDpi("1200");
            $mouse->setType("Óptico");
            $mouse->setType2("Oficina");
            $mouse->setConnector("Cable USB");
            $mouse->setFrequency("none");
            $mouse->setIdSubcategory($this->getReference(SubCategoryFixtures::PERIFERICS[1]));
            $mouse->setIdProduct($this->getReference('Periferico_Raton_'. $i));
            $manager->persist($mouse);
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