<?php

namespace App\DataFixtures;

use App\Entity\Desktop;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DesktopFixtures extends Fixture implements DependentFixtureInterface
{
   //Ordenadores de sobremesa
   public const RAM_MEMORY = ['8GB'];
   public const RAM_TECHNOLOGY = ['DDR3 SDRAM'];
   public const HARD_DISK = ['240GB SSD'];
   public const PORCESSOR_MAKER = ['INTEL'];
   public const PORCESSOR_MODEL = ['Core i5 3474'];
   public const PORCESSOR_VELOCITY = ['3.2 Ghz'];
   public const PORCESSOR_CORE = ['none'];
   public const PORCESSOR_CACHE = ['none'];
   public const GRAPHIC_MAKER = ['Intel'];
   public const GRAPHIC_MODEL = ['Integrada'];
   public const GRAPHIC_TECHNOLOGY = ['none'];
   public const GRAPHIC_CAPACITY = ['none'];
   public const GRAPHIC_INTERFACE = ['none'];
   public const USB_2_0 = [2];
   public const USB_3_0 = [2];
    
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<sizeof(self::RAM_MEMORY);$i++){
            $desktop = new Desktop();
            $desktop->setRamMemory(self::RAM_MEMORY[$i]);
            $desktop->setRamTechnology(self::RAM_TECHNOLOGY[$i]);
            $desktop->setHardDisk(self::HARD_DISK[$i]);
            $desktop->setProcessorMaker(self::PORCESSOR_MAKER[$i]);
            $desktop->setProcessorModel(self::PORCESSOR_MODEL[$i]);
            $desktop->setProcessorVelocity(self::PORCESSOR_VELOCITY[$i]);
            $desktop->setProcessorCore(self::PORCESSOR_CORE[$i]);
            $desktop->setProcessorCache(self::PORCESSOR_CACHE[$i]);
            $desktop->setGraphicMaker(self::GRAPHIC_MAKER[$i]);
            $desktop->setGraphicModel(self::GRAPHIC_MODEL[$i]);
            $desktop->setGraphicTechnology(self::GRAPHIC_TECHNOLOGY[$i]);
            $desktop->setGraphicCapacity(self::GRAPHIC_CAPACITY[$i]);
            $desktop->setGraphicInterface(self::GRAPHIC_INTERFACE[$i]);
            $desktop->setUsb20(self::USB_2_0[$i]);
            $desktop->setUsb30(self::USB_3_0[$i]);
            $desktop->setHdmi(0);
            $desktop->setIdSubcategory($this->getReference(SubCategoryFixtures::COMPUTERS[0]));
            $desktop->setIdProduct($this->getReference('Ordenador_sobremesa_'. $i));
            $manager->persist($desktop);
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
