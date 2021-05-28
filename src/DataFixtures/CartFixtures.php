<?php

namespace App\DataFixtures;

use App\Entity\Cart;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CartFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<1;$i++){
            $cart = new Cart();
            $cart->setUser($this->getReference(UserFixtures::NAMES[$i]));
            $manager->persist($cart);
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

