<?php

namespace App\Repository;

use App\Entity\EtapeCrystal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EtapeCrystal|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtapeCrystal|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtapeCrystal[]    findAll()
 * @method EtapeCrystal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtapeCrystalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtapeCrystal::class);
    }

    public function getCrystals()
    {
        $query = $this->createQueryBuilder('ec')
            ->select([
                'c.nom',
                'e.numero as etape',
                'ca.numero as campagne',
                'ca.difficile',
                'ec.minimum',
                'ec.maximum',
            ])
            ->join('ec.crystal', 'c')
            ->join('ec.etape', 'e')
            ->join('e.campagne', 'ca')
            ->getQuery();
        ;
        return $query->getResult();
    }

    // /**
    //  * @return EtapeCrystal[] Returns an array of EtapeCrystal objects
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
    public function findOneBySomeField($value): ?EtapeCrystal
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
