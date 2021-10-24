<?php

namespace App\Repository;

use App\Entity\BoissonChaude;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BoissonChaude|null find($id, $lockMode = null, $lockVersion = null)
 * @method BoissonChaude|null findOneBy(array $criteria, array $orderBy = null)
 * @method BoissonChaude[]    findAll()
 * @method BoissonChaude[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoissonChaudeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoissonChaude::class);
    }

    // /**
    //  * @return BoissonChaude[] Returns an array of BoissonChaude objects
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
    public function findOneBySomeField($value): ?BoissonChaude
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
