<?php

namespace App\Repository;

use App\Entity\RamMemory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RamMemory|null find($id, $lockMode = null, $lockVersion = null)
 * @method RamMemory|null findOneBy(array $criteria, array $orderBy = null)
 * @method RamMemory[]    findAll()
 * @method RamMemory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RamMemoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RamMemory::class);
    }

    // /**
    //  * @return RamMemory[] Returns an array of RamMemory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RamMemory
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
