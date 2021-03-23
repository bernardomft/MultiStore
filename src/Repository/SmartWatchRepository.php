<?php

namespace App\Repository;

use App\Entity\SmartWatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SmartWatch|null find($id, $lockMode = null, $lockVersion = null)
 * @method SmartWatch|null findOneBy(array $criteria, array $orderBy = null)
 * @method SmartWatch[]    findAll()
 * @method SmartWatch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SmartWatchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SmartWatch::class);
    }

    // /**
    //  * @return SmartWatch[] Returns an array of SmartWatch objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SmartWatch
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
