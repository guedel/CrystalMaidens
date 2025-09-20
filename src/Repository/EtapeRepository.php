<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\Campagne;
use App\Entity\Etape;
use App\Entity\EtapeAdversaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query as DBALQuery;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Etape>
 *
 * @method Etape|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etape|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etape[]    findAll()
 * @method Etape[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtapeRepository extends ServiceEntityRepository implements ExportInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etape::class);
    }

    public function getExportFilename(): string
    {
        return "Etapes.csv";
    }

    public function getExport(): mixed
    {
        return $this->createQueryBuilder('e')
            ->select([
                'c.id',
                'e.numero',
                'e.boss',
                'e.energie',
                'e.experience',
                'e.expMaiden',
                'e.coins',
                'e.minGachaOrbs',
                'e.maxGachaOrbs',
            ])
            ->join('e.campagne', 'c')
            ->getQuery()
            ->getResult()
        ;
    }

    public function getStages(): mixed
    {
        $sql = <<<SQL
        SELECT
            c.numero as numCampagne,
            c.difficile,
            e.numero as numEtape,
            e.boss,
            ea.qte as nbAdversaire,
            e.energie,
            e.energie / Sum(ea.qte) as energieParAvdersaire,
            e.exp_maiden,
            e.exp_maiden / Sum(ea.qte) as experienceParAvdersaire,
            e.experience
        FROM etape e
        INNER JOIN campagne c ON e.campagne_id = c.id
        INNER JOIN (
            SELECT etape_id, SUM(quantity) as qte
            FROM etape_adversaire
            GROUP BY etape_id
        ) ea ON ea.etape_id = e.id
        WHERE e.energie IS NOT NULL
        GROUP BY c.numero, c.difficile, e.numero, e.boss, e.energie
        ORDER BY 7 DESC, 9 DESC
SQL;
        $rsm = (new ResultSetMapping())
            ->addScalarResult('numCampagne', 'numCampagne', 'integer')
            ->addScalarResult('difficile', 'difficile', 'boolean')
            ->addScalarResult('numEtape', 'numEtape', 'integer')
            ->addScalarResult('boss', 'boss', 'boolean')
            ->addScalarResult('energie', 'energie', 'integer')
            ->addScalarResult('nbAdversaire', 'nbAdversaire', 'integer')
            ->addScalarResult('energieParAvdersaire', 'energieParAvdersaire', 'float')
            ->addScalarResult('exp_maiden', 'maidenExperience', 'integer')
            ->addScalarResult('experience', 'playerExperience', 'integer')
            ->addScalarResult('experienceParAvdersaire', 'maidenExpByAdv', 'float')
        ;
        $qb = $this->getEntityManager()->createNativeQuery($sql, $rsm);
        return $qb->getResult();
    }
}
