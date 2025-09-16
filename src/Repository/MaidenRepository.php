<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\Maiden;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Maiden>
 * @implements ExportInterface
 *
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

    public function getExportFilename(): string
    {
        return "Maidens.csv";
    }

    public function getExport(): mixed
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
}
