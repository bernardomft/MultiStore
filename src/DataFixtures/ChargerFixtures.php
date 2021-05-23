<?php

namespace App\DataFixtures;

use App\Entity\Charger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ChargerFixtures extends Fixture  implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    { 
        for($i = 0; $i < 10; $i++)
        {
            $charger = new Charger();
            $charger->setVoltage("18 V");
            $charger->setAmperage("1A/2A");
            $charger->setConnection("USB");
            $charger->setIdSubcategory($this->getReference(SubCategoryFixtures::ACEESORIES[1]));
            $charger->setIdProduct($this->getReference('Accesorio_Cargador_'. $i));
            $manager->persist($charger);
            $manager->flush();
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
