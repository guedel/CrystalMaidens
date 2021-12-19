<?php

namespace App\Repository;

use App\Entity\IngredientConstituant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IngredientConstituant|null find($id, $lockMode = null, $lockVersion = null)
 * @method IngredientConstituant|null findOneBy(array $criteria, array $orderBy = null)
 * @method IngredientConstituant[]    findAll()
 * @method IngredientConstituant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IngredientConstituantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IngredientConstituant::class);
    }

    // /**
    //  * @return IngredientConstituant[] Returns an array of IngredientConstituant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IngredientConstituant
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
