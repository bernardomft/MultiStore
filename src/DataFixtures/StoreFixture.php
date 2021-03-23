<?php

namespace App\DataFixtures;

use App\Entity\Store;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class StoreFixture extends Fixture implements DependentFixtureInterface
{
    public const NAMES = ['Berni', 'Guille', 'Dani', 'David', 'Adri', 'Angelica',
                            'Lu', 'Jorge', 'Rober' , 'Ariel', 'Edu', 'Matatoros'];
                            
    public function load(ObjectManager $manager)
    {
        $store = new Store();
        $store->setName('MultiStore');
        $store->setUsername('MultiStore');
        $store->setNif('11111111A');
        $store->setAddress('calle avenida 16 4D');
        $store->setBalance(0.0);
        $store->setDescription('Multistore descripcion');
        $store->setWebPage('www.multistore.com');
        $store->setIdUser($this->getReference(UserFixtures::USER_ADMIN_REFERENCE));
        $manager->persist($store);
        $manager->flush();
        $this->addReference('MultiStore', $store);

        $store = new Store();
        $store->setName('GuilleStore');
        $store->setUsername('GuilleStore');
        $store->setNif('11111111B');
        $store->setAddress('calle avenida 14 4D');
        $store->setBalance(0.0);
        $store->setDescription('GuilleStore descripcion');
        $store->setWebPage('www.GuilleStore.com');
        $store->setIdUser($this->getReference('Guille'));
        $manager->persist($store);
        $manager->flush();
        $this->addReference('GuilleStore', $store);

        $store = new Store();
        $store->setName('DaniStore');
        $store->setUsername('DaniStore');
        $store->setNif('11111111C');
        $store->setAddress('calle avenida 12 4D');
        $store->setBalance(0.0);
        $store->setDescription('DaniStore descripcion');
        $store->setWebPage('www.DaniStore.com');
        $store->setIdUser($this->getReference('Dani'));
        $manager->persist($store);
        $manager->flush();
        $this->addReference('DaniStore', $store);

        $store = new Store();
        $store->setName('AdriStore');
        $store->setUsername('AdriStore');
        $store->setNif('11111111D');
        $store->setAddress('calle avenida 10 4D');
        $store->setBalance(0.0);
        $store->setDescription('AdriStore descripcion');
        $store->setWebPage('www.AdriStore.com');
        $store->setIdUser($this->getReference('Adri'));
        $manager->persist($store);
        $manager->flush();
        $this->addReference('AdriStore', $store);
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
}
