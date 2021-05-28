<?php

namespace App\DataFixtures;

use App\Entity\Desktop;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DesktopFixtures extends Fixture implements DependentFixtureInterface
{
   //Ordenadores de sobremesa
   public const RAM_MEMORY = ['8GB','32GB', '8GB', '16GB'];
   public const RAM_TECHNOLOGY = ['DDR3 SDRAM', 'DDR4', 'DDR4', 'DDR3 SDRAM'];
   public const HARD_DISK = ['240GB SSD', '2TB HDD 512GB SSD', '256GB SSD', '1TB HDD 240GB SSD'];
   public const PORCESSOR_MAKER = ['INTEL','INTEL', 'INTEL', 'INTEL'];
   public const PORCESSOR_MODEL = ['Core i5',
                                'Core i7',
                                'Core i5',
                                'Core i3'];
   public const PORCESSOR_VELOCITY = ['3.2 Ghz','3.8Ghz', '4.3Ghz', '4.3Ghz'];
   public const PORCESSOR_CORE = ['none', 'none', 'none' , '4'];
   public const PORCESSOR_CACHE = ['none' , 'none', 'none', 'none'];
   public const GRAPHIC_MAKER = ['INTEL', 'NVIDIA', 'INTEL' , 'NVIDIA'];
   public const GRAPHIC_MODEL = ['Integrada', 'GeForce RTX 2070' ,'Intel UHD Graphics 630','GeForce GTX 1050'];
   public const GRAPHIC_TECHNOLOGY = ['none', 'GDDR6', 'none', 'GDDR6'];
   public const GRAPHIC_CAPACITY = ['none','8GB', 'none', '4GB'];
   public const GRAPHIC_INTERFACE = ['none','PCI-Express x16', 'none', 'none'];
   public const USB_2_0 = [3,3,4,2];
   public const USB_3_0 = [2, 3,4, 3];
    
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
            $desktop->setOs('WIN 10');
            $desktop->setIdSubcategory($this->getReference(SubCategoryFixtures::COMPUTERS[0]));
            $desktop->setIdProduct($this->getReference('Ordenador_sobremesa_'. $i));
            $manager->persist($desktop);
            $manager->flush();
        }

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
            $desktop->setOs('WIN 10');
            $desktop->setIdSubcategory($this->getReference(SubCategoryFixtures::COMPUTERS[0]));
            $desktop->setIdProduct($this->getReference('Ordenador_sobremesa_2_'. $i));
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
