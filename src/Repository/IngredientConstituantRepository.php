<?php declare(strict_types=1);

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
class IngredientConstituantRepository extends ServiceEntityRepository implements ExportInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IngredientConstituant::class);
    }

    public function getExportFilename()
    {
        return "IngredientConstituant.csv";
    }

    public function getExport()
    {
        return $this->createQueryBuilder('ic')
            ->select([
                'i.nom AS ingredient',
                'c.nom AS constituant',
                'ic.quantity',
            ])
            ->join('ic.ingredient', 'i')
            ->join('ic.constituant', 'c')
            ->orderBy('i.nom', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
}
