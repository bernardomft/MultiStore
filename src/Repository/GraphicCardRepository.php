<?php

namespace App\Repository;

use App\Entity\GraphicCard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GraphicCard|null find($id, $lockMode = null, $lockVersion = null)
 * @method GraphicCard|null findOneBy(array $criteria, array $orderBy = null)
 * @method GraphicCard[]    findAll()
 * @method GraphicCard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GraphicCardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GraphicCard::class);
    }

    // /**
    //  * @return GraphicCard[] Returns an array of GraphicCard objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GraphicCard
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
