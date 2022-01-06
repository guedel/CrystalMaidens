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

    public function getShards()
    {
        $query = $this->createQueryBuilder('ef')
        ->select([
            'm.nom',
            'e.numero as etape',
            'ca.numero as campagne',
            'ca.difficile',
            'ef.minimum',
            'ef.maximum',
        ])
        ->join('ef.maiden', 'm')
        ->join('ef.etape', 'e')
        ->join('e.campagne', 'ca')
        ->orderBy('m.nom')
        ->getQuery();
    ;
    return $query->getResult();
    ;

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
