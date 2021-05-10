<?php

namespace App\DataFixtures;

use App\Entity\SmartWatch;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SmartwatchFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<10;$i++){
            $webcam = new SmartWatch();
            $webcam->setSo("IOS");
            $webcam->setResolution("HD");
            $webcam->setResolutionPx("720px");
            $webcam->setTechnology("GPS + CELLULAR");
            $webcam->setIdSubcategory($this->getReference(SubCategoryFixtures::GADGETS[0]));
            $webcam->setIdProduct($this->getReference('Gadget_Smartwatch_'. $i));
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