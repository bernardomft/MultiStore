<?php

namespace App\DataFixtures;

use App\Entity\Screen;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ScreenFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<10;$i++){
            $screen = new Screen();
            $screen->setSize("27\"");
            $screen->setResolution("FHD");
            $screen->setResolutionPx("1920x180px");
            $screen->setFrequency("60Hz");
            $screen->setResponseTime("4ms");
            $screen->setShine("1800R");
            $screen->setView("VA");
            $screen->setConnectors("HDMI");
            $screen->setIdSubcategory($this->getReference(SubCategoryFixtures::PERIFERICS[2]));
            $screen->setIdProduct($this->getReference('Periferico_Pantalla_'. $i));
            $manager->persist($screen);
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
