<?php

namespace App\Repository;

use App\Entity\BossIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BossIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method BossIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method BossIngredient[]    findAll()
 * @method BossIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BossIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BossIngredient::class);
    }

    // /**
    //  * @return BossIngredient[] Returns an array of BossIngredient objects
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
    public function findOneBySomeField($value): ?BossIngredient
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
