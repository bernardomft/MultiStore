<?php

namespace App\Repository;

use App\Entity\Webcam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Webcam|null find($id, $lockMode = null, $lockVersion = null)
 * @method Webcam|null findOneBy(array $criteria, array $orderBy = null)
 * @method Webcam[]    findAll()
 * @method Webcam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebcamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Webcam::class);
    }

    // /**
    //  * @return Webcam[] Returns an array of Webcam objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Webcam
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
