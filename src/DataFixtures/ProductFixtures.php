<?php

namespace App\DataFixtures;

use App\Entity\Product;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    //Ordenadores de sobremesa
    public const NAMES = ['Hp Elite 8300 SFF',
                        'MSI Meg Infinite X 10SD-669EU',
                        'Lenovo IdeaCentre 5',
                    'NITROPC - PC Gamer VX '];
    public const MODELS = ['ELITE 8300 SFF', 
                        'MSI Meg Infinite X 10SD-669EU',
                        'Lenovo IdeaCentre 5',
                    'NITROPC - PC Gamer VX '];
    public const MARKS = ['HP',
                        'MSI',
                        'Lenovo',
                    'NITROPC'];
    public const MARKERS = ['HP',
                        'MSI',
                    'Lenovo',
                'NITROPC'];
    public const STOCK = [4,5,9,3];
    public const PRICE = [205.00, 2399.99, 469.99, 694.63];
    public const DISCOUNT = [8, 12, 0, 25];
    public const PICTURES =  ['Hp_Elite_8300_SFF.jpg',
                        'MSI_Meg_Infinite_X_10SD-669EU.jpg',
                        'NITROPC_ PC_Gamer_VX.jpg',
                        'Lenovo_Idea_Centre_5.jpg'];
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
            $product->setPicture(self::PICTURES[$i]);
            $product->setPrice(self::PRICE[$i]);
            $product->setDisscount(self::DISCOUNT[$i]);
            $product->setSecondHand(false);
            $product->setIdStore($this->getReference('MultiStore'));
            $product->setIdCategory($this->getReference('Ordenadores'));
            $manager->persist($product);
            $manager->flush();
            $this->addReference('Ordenador_sobremesa_'. $i, $product);
        }

        for($i=0;$i<sizeof(self::NAMES);$i++){
            $product = new Product();
            $product->setName(self::NAMES[$i]);
            $product->setModel(self::MODELS[$i]);
            $product->setMark(self::MARKS[$i]);
            $product->setMaker(self::MARKERS[$i]);
            $product->setStock(self::STOCK[$i]);
            $product->setDescription('description' . self::NAMES[$i]);
            $product->setPicture(self::PICTURES[$i]);
            $product->setPrice(self::PRICE[$i]);
            $product->setDisscount(self::DISCOUNT[$i]);
            $product->setSecondHand(false);
            $product->setIdStore($this->getReference('MultiStore'));
            $product->setIdCategory($this->getReference('Ordenadores'));
            $manager->persist($product);
            $manager->flush();
            $this->addReference('Ordenador_sobremesa_2_'. $i, $product);
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
