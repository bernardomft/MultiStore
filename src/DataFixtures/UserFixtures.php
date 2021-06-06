<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\Length;

class UserFixtures extends Fixture
{
    public const NAMES = ['Berni', 'Guille', 'Dani', 'David', 'Adri', 'Angelica',
                            'Lu', 'Jorge', 'Rober' , 'Ariel', 'Edu', 'Matatoros'];
    
    public const USER_ADMIN_REFERENCE = 'user-admin';
    //public const USUARIO_USER_REFERENCIA = 'user-user';
    private $userPasswordEncoderInterface;
    public function __construct(UserPasswordEncoderInterface $userPasswordEncoderInterface)
    {
        $this->userPasswordEncoderInterface = $userPasswordEncoderInterface;
    }
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        
        $admin->setUsername('admin');
        $admin->setEmail('admin@mail.com');
        $admin->setName('admin');
        $admin->setSurname('admin');
        $admin->setAddress('Calle 1 16 3ºP');
        $admin->setBirthday(new \DateTime('2021-04-13 10:00:00'));
        $admin->setPicture(null);
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->userPasswordEncoderInterface->encodePassword($admin, '1324asdf'));
        $manager->persist($admin);
        $manager->flush();
        $this->addReference('ADMIN_USER', $admin);

        for($i=0;$i<12;$i++){
            $user = new User();
            $user->setUsername(self::NAMES[$i]);
            $user->setEmail(self::NAMES[$i].'@mail.com');
            $user->setName(self::NAMES[$i]);
            $user->setSurname('Lopez');
            $user->setAddress('Calle'.$i.'16 3ºP');
            $user->setBirthday(new \DateTime('2021-04-13 10:00:00'));
            $user->setPicture(null);
            if(self::NAMES[$i] == 'Guille')
                $user->setRoles(['ROLE_STORE']);
            else
                $user->setRoles(['ROLE_USER']);
            $user->setPassword($this->userPasswordEncoderInterface->encodePassword($user, '1324asdf'));
            $manager->persist($user);
            $manager->flush();
            $this->addReference(self::NAMES[$i], $user);
        }
    }
    
}
