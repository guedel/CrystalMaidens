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
class EtapeItemRepository extends ServiceEntityRepository implements ExportInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtapeItem::class);
    }

    public function getExportFilename()
    {
        return "EtapeItem.csv";
    }

    public function getExport()
    {
        return $this->createQueryBuilder('ei')
            ->select([
                'cp.id as campagne',
                'e.numero as etape',
                'ei.taux',
                'i.nom as item',
                'r.nom as rarity',

            ])
            ->join('ei.etape', 'e')
            ->join('e.campagne', 'cp')
            ->join('ei.item', 'i')
            ->leftJoin('ei.rarity', 'r')
            ->addOrderBy('cp.id', 'ASC')
            ->addOrderBy('e.numero', 'ASC')
            ->getQuery()
            ->getResult()
        ;

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
