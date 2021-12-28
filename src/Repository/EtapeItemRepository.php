<?php

namespace App\Repository;

use App\Entity\EtapeItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EtapeItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtapeItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtapeItem[]    findAll()
 * @method EtapeItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtapeItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtapeItem::class);
    }

    // /**
    //  * @return EtapeItem[] Returns an array of EtapeItem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EtapeItem
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
