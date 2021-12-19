<?php

namespace App\Repository;

use App\Entity\Maiden;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Maiden|null find($id, $lockMode = null, $lockVersion = null)
 * @method Maiden|null findOneBy(array $criteria, array $orderBy = null)
 * @method Maiden[]    findAll()
 * @method Maiden[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaidenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Maiden::class);
    }

    // /**
    //  * @return Maiden[] Returns an array of Maiden objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Maiden
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
