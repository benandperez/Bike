<?php

namespace App\Repository;

use App\Entity\TypeMembership;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeMembership|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeMembership|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeMembership[]    findAll()
 * @method TypeMembership[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeMembershipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeMembership::class);
    }

    // /**
    //  * @return TypeMembership[] Returns an array of TypeMembership objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeMembership
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
