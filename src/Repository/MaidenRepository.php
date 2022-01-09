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
class MaidenRepository extends ServiceEntityRepository implements ExportInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Maiden::class);
    }

    public function getExportFilename()
    {
        return "Maidens.csv";
    }

    public function getExport()
    {
        return $this->createQueryBuilder('m')
            ->select([
                'm.nom',
                'm.nickname',
                'c.nom as classe',
                'e.nom as element',
                'r.nom as rarete',
            ])
            ->join('m.classe', 'c')
            ->join('m.element', 'e')
            ->join('m.rarity', 'r')
            ->orderBy('m.nom')
            ->getQuery()
            ->getResult()
        ;

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
