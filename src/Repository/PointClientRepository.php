<?php

namespace App\Repository;

use App\Entity\PointClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PointClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method PointClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method PointClient[]    findAll()
 * @method PointClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PointClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PointClient::class);
    }

    // /**
    //  * @return PointClient[] Returns an array of PointClient objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PointClient
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
