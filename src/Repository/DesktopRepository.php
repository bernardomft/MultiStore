<?php

namespace App\Repository;

use App\Entity\Desktop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Desktop|null find($id, $lockMode = null, $lockVersion = null)
 * @method Desktop|null findOneBy(array $criteria, array $orderBy = null)
 * @method Desktop[]    findAll()
 * @method Desktop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DesktopRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Desktop::class);
    }

    // /**
    //  * @return Desktop[] Returns an array of Desktop objects
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
    public function findOneBySomeField($value): ?Desktop
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
