<?php

namespace App\Repository;

use App\Entity\EtapeFragment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EtapeFragment|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtapeFragment|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtapeFragment[]    findAll()
 * @method EtapeFragment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtapeFragmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtapeFragment::class);
    }

    // /**
    //  * @return EtapeFragment[] Returns an array of EtapeFragment objects
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
    public function findOneBySomeField($value): ?EtapeFragment
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
