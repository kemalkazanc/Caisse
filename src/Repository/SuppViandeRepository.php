<?php

namespace App\Repository;

use App\Entity\SuppViande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SuppViande|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuppViande|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuppViande[]    findAll()
 * @method SuppViande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuppViandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SuppViande::class);
    }

    // /**
    //  * @return SuppViande[] Returns an array of SuppViande objects
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
    public function findOneBySomeField($value): ?SuppViande
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
