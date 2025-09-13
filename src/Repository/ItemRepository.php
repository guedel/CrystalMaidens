<?php

namespace App\Repository;

use App\Entity\Item;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Item|null find($id, $lockMode = null, $lockVersion = null)
 * @method Item|null findOneBy(array $criteria, array $orderBy = null)
 * @method Item[]    findAll()
 * @method Item[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemRepository extends ServiceEntityRepository implements ExportInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    public function getExportFilename()
    {
        return "Items.csv";
    }

    public function getExport()
    {
        return $this->createQueryBuilder('i')
            ->select([
                'i.nom',
                'c.nom as classe',
                'em.nom as emplacement',
                '\'\' as rarete',
                'm.nom as maiden',
                'i.description',
            ])
            ->join('i.classe', 'c')
            ->join('i.emplacement', 'em')
            ->leftJoin('i.maiden', 'm')
            ->orderBy('i.nom')
            ->getQuery()
            ->getResult()
        ;
    }
}
