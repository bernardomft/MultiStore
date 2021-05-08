<?php

namespace App\DataFixtures;

use App\Entity\Desktop;
use App\Entity\Laptop;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LaptopFixtures extends Fixture implements DependentFixtureInterface
{
   //Ordenadores de sobremesa
  /* public const RAM_MEMORY = ['8GB','32GB', '8GB', '16GB'];
   public const RAM_TECHNOLOGY = ['DDR3 SDRAM', 'DDR4', 'DDR4', 'DDR3 SDRAM'];
   public const HARD_DISK = ['240GB SSD', '2TB HDD 512GB SSD', '256GB SSD', '1TB HDD 240GB SSD'];
   public const PORCESSOR_MAKER = ['INTEL','INTEL', 'INTEL', 'INTEL'];
   public const PORCESSOR_MODEL = ['Core i5 3474',
                                'Core i7-10700KF',
                                'Core i5-10400',
                                'Core i3-10100'];
   public const PORCESSOR_VELOCITY = ['3.2 Ghz','3.8Ghz', '4.3Ghz', '4.3Ghz'];
   public const PORCESSOR_CORE = ['none', 'none', 'none' , '4'];
   public const PORCESSOR_CACHE = ['none' , 'none', 'none', 'none'];
   public const GRAPHIC_MAKER = ['INTEL', 'NVIDIA', 'INTEL' , 'NVIDIA'];
   public const GRAPHIC_MODEL = ['Integrada', 'GeForce RTX 2070' ,'Intel UHD Graphics 630','GeForce GTX 1050'];
   public const GRAPHIC_TECHNOLOGY = ['none', 'GDDR6', 'none', 'GDDR6'];
   public const GRAPHIC_CAPACITY = ['none','8GB', 'none', '4GB'];
   public const GRAPHIC_INTERFACE = ['none','PCI-Express x16', 'none', 'none'];
   public const USB_2_0 = [3,3,4,2];
   public const USB_3_0 = [2, 3,4, 3];*/
    
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<10;$i++){
            $laptop = new Laptop();
            $laptop->setRamMemory("8GB");
            $laptop->setRamTechology("none");
            $laptop->setHardDisk("256GB SSD");
            $laptop->setHardDiskTechnology("SSD");
            $laptop->setProcessorMaker("Apple");
            $laptop->setProcessorModel("CHIP M1");
            $laptop->setProcessorVelocity("2.4 Ghz");
            $laptop->setProcessorCore("8");
            $laptop->setProcessorCache("none");
            $laptop->setGraphicMaker("Apple");
            $laptop->setGraphicModel("Integrada");
            $laptop->setGraphicTechnology("none");
            $laptop->setGraphicCapacity("none");
            $laptop->setGraphicInterface("none");
            $laptop->setUsb20(0);
            $laptop->setUsb30(0);
            $laptop->setHdmi(0);
            //$laptop->setOs('Macintosh Catalina');
            $laptop->setScreenResolution("2560x1600px");
            $laptop->setIdSubcategory($this->getReference(SubCategoryFixtures::COMPUTERS[1]));
            $laptop->setIdProduct($this->getReference('Ordenador_portatil_'. $i));
            $manager->persist($laptop);
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
