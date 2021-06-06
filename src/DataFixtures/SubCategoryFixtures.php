<?php

namespace App\DataFixtures;

use App\Entity\SubCategory;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SubCategoryFixtures extends Fixture implements DependentFixtureInterface
{
    public const COMPUTERS = ['PC/Sobremesa' ,'Portatil'];
    public const COMPUTERS_CART = ['ramMemory#ramTechnology#RamFrequency#HardDisk#processorMaker#processorModel#processorVelocity#processorCore#processorCache#graphicMaker#graphicModel#graphicTechnology#graphicCapacity#graphicInterface#usb2_0#usb3_0#hdmi#dvi#bluetooth',
                                    'none'];
    public const PERIFERICS = ['Teclado' ,'Raton', 'Pantalla'];
    public const ACEESORIES = ['Funda' ,'Cargador', 'Auriculares'];
    public const GADGETS = ['Smartwatch' ,'Webcam'];

    public function load(ObjectManager $manager)
    {
        foreach(self::COMPUTERS as $c){
            $subCategory = new SubCategory();
            $subCategory->setName($c);
            $subCategory->setDescription('Descripcion de ' . $c);
            $subCategory->setCaracteristics(self::COMPUTERS_CART[array_search($c,self::COMPUTERS)]);
            $subCategory->setIdCategory($this->getReference('Ordenadores'));
            $manager->persist($subCategory);
            $manager->flush();
            $this->addReference($c, $subCategory);
        }

        foreach(self::PERIFERICS as $p){
            $subCategory = new SubCategory();
            $subCategory->setName($p);
            $subCategory->setDescription('Descripcion de ' . $p);
            $subCategory->setIdCategory($this->getReference('Perifericos'));
            $manager->persist($subCategory);
            $manager->flush();
            $this->addReference($p, $subCategory);
        }


        foreach(self::ACEESORIES as $a){
            $subCategory = new SubCategory();
            $subCategory->setName($a);
            $subCategory->setDescription('Descripcion de ' . $a);
            $subCategory->setIdCategory($this->getReference('Accesorios'));
            $manager->persist($subCategory);
            $manager->flush();
            $this->addReference($a, $subCategory);
        }

        foreach(self::GADGETS as $g){
            $subCategory = new SubCategory();
            $subCategory->setName($g);
            $subCategory->setDescription('Descripcion de ' . $g);
            $subCategory->setIdCategory($this->getReference('Gadgets'));
            $manager->persist($subCategory);
            $manager->flush();
            $this->addReference($g, $subCategory);
        }
    }

    

    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }
}
