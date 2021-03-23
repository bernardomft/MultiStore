<?php

namespace App\Repository;

use App\Entity\DeviceCase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DeviceCase|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeviceCase|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeviceCase[]    findAll()
 * @method DeviceCase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeviceCaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeviceCase::class);
    }

    // /**
    //  * @return DeviceCase[] Returns an array of DeviceCase objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DeviceCase
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
