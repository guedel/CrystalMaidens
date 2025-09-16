<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\EtapeFragment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtapeFragment>
 *
 * @method EtapeFragment|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtapeFragment|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtapeFragment[]    findAll()
 * @method EtapeFragment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtapeFragmentRepository extends ServiceEntityRepository implements ExportInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtapeFragment::class);
    }

    public function getShards(): mixed
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
    public function getExportFilename(): string
    {
        return "EtapeFragment.csv";
    }

    public function getExport(): mixed
    {
        return $this->createQueryBuilder('ef')
            ->select([
                'cp.id as campagne',
                'e.numero as etape',
                'm.nom as maiden',
                'ef.minimum',
                'ef.maximum',

            ])
            ->join('ef.etape', 'e')
            ->join('e.campagne', 'cp')
            ->join('ef.maiden', 'm')
            ->addOrderBy('cp.id', 'ASC')
            ->addOrderBy('e.numero', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
}
