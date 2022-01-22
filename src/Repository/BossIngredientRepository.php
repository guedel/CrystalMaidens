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
class BossIngredientRepository extends ServiceEntityRepository implements ExportInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BossIngredient::class);
    }

    public function getExportFilename()
    {
        return "BossIngredients.csv";
    }

    public function getExport()
    {
        return $this->createQueryBuilder('bi')
            ->select([
                'bi.nom',
                'l.nom as level',
            ])
            ->join('bi.level', 'l')
            ->getQuery()
            ->getResult()
        ;

    }
}
