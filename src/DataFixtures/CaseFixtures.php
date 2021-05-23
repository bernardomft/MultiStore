<?php

namespace App\DataFixtures;

use App\Entity\DeviceCase;
use App\Entity\SmartWatch;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CaseFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<10;$i++){
            $webcam = new DeviceCase();
            $webcam->setDevice("Apple Iphone 12 Pro Max");
            $webcam->setColor("transparent");
            $webcam->setIdSubcategory($this->getReference(SubCategoryFixtures::ACEESORIES[0]));
            $webcam->setIdProduct($this->getReference('Accesorio_Funda_'. $i));
            $manager->persist($webcam);
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