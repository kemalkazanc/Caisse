<?php

namespace App\Repository;

use App\Entity\Barquette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Barquette|null find($id, $lockMode = null, $lockVersion = null)
 * @method Barquette|null findOneBy(array $criteria, array $orderBy = null)
 * @method Barquette[]    findAll()
 * @method Barquette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BarquetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Barquette::class);
    }

    // /**
    //  * @return Barquette[] Returns an array of Barquette objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Barquette
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
