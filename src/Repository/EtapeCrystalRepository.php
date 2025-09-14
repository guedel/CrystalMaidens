<?php declare(strict_types=1);

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
class EtapeCrystalRepository extends ServiceEntityRepository implements ExportInterface
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

    public function getExportFilename()
    {
        return "EtapeCrystal.csv";
    }

    public function getExport()
    {
        return $this->createQueryBuilder('ec')
            ->select([
                'cp.id as campagne',
                'e.numero as etape',
                'c.nom as crystal',
                'ec.minimum',
                'ec.maximum',

            ])
            ->join('ec.etape', 'e')
            ->join('e.campagne', 'cp')
            ->join('ec.crystal', 'c')
            ->addOrderBy('cp.id', 'ASC')
            ->addOrderBy('e.numero', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
}
