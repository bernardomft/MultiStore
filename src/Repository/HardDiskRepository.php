<?php

namespace App\Repository;

use App\Entity\HardDisk;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HardDisk|null find($id, $lockMode = null, $lockVersion = null)
 * @method HardDisk|null findOneBy(array $criteria, array $orderBy = null)
 * @method HardDisk[]    findAll()
 * @method HardDisk[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HardDiskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HardDisk::class);
    }

    // /**
    //  * @return HardDisk[] Returns an array of HardDisk objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HardDisk
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
