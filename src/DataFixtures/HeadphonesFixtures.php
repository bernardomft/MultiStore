<?php

namespace App\DataFixtures;

use App\Entity\Headphones;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class HeadphonesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {   
        for($i = 0; $i < 10; $i++)
        {
            $headphone = new Headphones();
            $headphone->setType("Auricular");
            $headphone->setConnection("Lightning");
            $headphone->setIdSubcategory($this->getReference(SubCategoryFixtures::ACEESORIES[2]));
            $headphone->setIdProduct($this->getReference('Accesorio_Auriculares_'. $i));
            $manager->persist($headphone);
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
