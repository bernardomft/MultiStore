<?php

namespace App\DataFixtures;

use App\Entity\Product;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    //Ordenadores de sobremesa
    public const NAMES = ['Hp Elite 8300 SFF - Ordenador de sobremesa'];
    public const MODELS = ['ELITE 8300 SFF'];
    public const MARKS = ['HP'];
    public const MARKERS = ['HP'];
    public const STOCK = [4];
    public const PRICE = [205.00];
    public const DISCOUNT = [8];
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<sizeof(self::NAMES);$i++){
            $product = new Product();
            $product->setName(self::NAMES[$i]);
            $product->setModel(self::MODELS[$i]);
            $product->setMark(self::MARKS[$i]);
            $product->setMaker(self::MARKERS[$i]);
            $product->setStock(self::STOCK[$i]);
            $product->setDescription('description' . self::NAMES[$i]);
            $product->setPicture('no hay foto de momento');
            $product->setPrice(self::PRICE[$i]);
            $product->setDisscount(self::DISCOUNT[$i]);
            $product->setSecondHand(false);
            $product->setIdStore($this->getReference('MultiStore'));
            $product->setIdCategory($this->getReference('Ordenadores'));
            $manager->persist($product);
            $manager->flush();
            $this->addReference('Ordenador_sobremesa_'. $i, $product);
        }
    }

    public function getDependencies()
    {
        return [
            StoreFixture::class,
            CategoryFixtures::class
        ];
    }
}
