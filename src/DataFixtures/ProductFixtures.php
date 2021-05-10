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
        //Ordenadores portátiles
        for($i=0;$i<10;$i++){
            $product = new Product();
            $product->setName("Apple MacBook Pro 13\"");
            $product->setModel("MacBook Pro 13\"");
            $product->setMark("Apple");
            $product->setMaker("Apple");
            $product->setStock($i + 1);
            $product->setDescription("Ordenador Apple. Muy caro para lo que es");
            $product->setPicture('MackBookPro13.jpg');
            $product->setPrice(1449.00);
            $product->setDisscount(0);
            $product->setSecondHand(false);
            $product->setIdStore($this->getReference('MultiStore'));
            $product->setIdCategory($this->getReference('Ordenadores'));
            $manager->persist($product);
            $manager->flush();
            $this->addReference('Ordenador_portatil_'. $i, $product);
        }
        //teclados
        for($i=0;$i<10;$i++){
            $product = new Product();
            $product->setName("Logitech G915 LIGHTSPEED");
            $product->setModel("G915 LIGHTSPEED");
            $product->setMark("Logitech");
            $product->setMaker("Logitech");
            $product->setStock($i + 1);
            $product->setDescription("PENTAKILLL!!!!!!");
            $product->setPicture('Logitech_G915_LIGHTSPEED.jpg');
            $product->setPrice(194.99);
            $product->setDisscount(0);
            $product->setSecondHand(false);
            $product->setIdStore($this->getReference('MultiStore'));
            $product->setIdCategory($this->getReference('Perifericos'));
            $manager->persist($product);
            $manager->flush();
            $this->addReference('Periferico_Teclado_'. $i, $product);
        }

        //ratones
        for($i=0;$i<10;$i++){
            $product = new Product();
            $product->setName("HP X500");
            $product->setModel("X500");
            $product->setMark("HP");
            $product->setMaker("HP");
            $product->setStock($i + 1);
            $product->setDescription("PENTAKILLL!!!!!!");
            $product->setPicture('HP_X500.jpg');
            $product->setPrice(8.99);
            $product->setDisscount(0);
            $product->setSecondHand(false);
            $product->setIdStore($this->getReference('MultiStore'));
            $product->setIdCategory($this->getReference('Perifericos'));
            $manager->persist($product);
            $manager->flush();
            $this->addReference('Periferico_Raton_'. $i, $product);
        }
         //pantallas
         for($i=0;$i<10;$i++){
            $product = new Product();
            $product->setName("Samsung C27F390");
            $product->setModel("C27F390");
            $product->setMark("Samsung");
            $product->setMaker("Samsung");
            $product->setStock($i + 1);
            $product->setDescription("Monitor curvo gamming");
            $product->setPicture('Samsung _C27F390.webp');
            $product->setPrice(149.00);
            $product->setDisscount(0);
            $product->setSecondHand(false);
            $product->setIdStore($this->getReference('MultiStore'));
            $product->setIdCategory($this->getReference('Perifericos'));
            $manager->persist($product);
            $manager->flush();
            $this->addReference('Periferico_Pantalla_'. $i, $product);
        }
        //Smartwatchs
        for($i=0;$i<10;$i++){
            $product = new Product();
            $product->setName("Apple Watch SE");
            $product->setModel("SE");
            $product->setMark("Apple");
            $product->setMaker("Apple");
            $product->setStock($i + 1);
            $product->setDescription("reloj manzana");
            $product->setPicture('Apple_Watch_SE.jpg');
            $product->setPrice(359.00);
            $product->setDisscount(0);
            $product->setSecondHand(false);
            $product->setIdStore($this->getReference('MultiStore'));
            $product->setIdCategory($this->getReference('Gadgets'));
            $manager->persist($product);
            $manager->flush();
            $this->addReference('Gadget_Smartwatch_'. $i, $product);
        }
        //Webcams
        for($i=0;$i<10;$i++){
            $product = new Product();
            $product->setName("Logitech C920s HD Pro");
            $product->setModel("C920s HD Pro");
            $product->setMark("Logitech");
            $product->setMaker("Logitech");
            $product->setStock($i + 1);
            $product->setDescription("Webcam HD");
            $product->setPicture('Logitech_C920s-HD_Pro.jpg');
            $product->setPrice(86.61);
            $product->setDisscount(0);
            $product->setSecondHand(false);
            $product->setIdStore($this->getReference('MultiStore'));
            $product->setIdCategory($this->getReference('Gadgets'));
            $manager->persist($product);
            $manager->flush();
            $this->addReference('Gadget_Webcam_'. $i, $product);
        }
    }



    public function getDependencies()
    {
        return [
            StoreFixture::class,
            CategoryFixtures::class,
        ];
    }
}
