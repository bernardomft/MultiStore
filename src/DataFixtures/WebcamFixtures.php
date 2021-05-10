<?php

namespace App\DataFixtures;

use App\Entity\Webcam;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class WebcamFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<10;$i++){
            $webcam = new Webcam();
            $webcam->setResolutionPx("1800");
            $webcam->setSound("Audio Nítido");
            $webcam->setConnection("Oficina");
            $webcam->setConnection("Cable USB");
            $webcam->setIdSubcategory($this->getReference(SubCategoryFixtures::GADGETS[1]));
            $webcam->setIdProduct($this->getReference('Gadget_Webcam_'. $i));
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