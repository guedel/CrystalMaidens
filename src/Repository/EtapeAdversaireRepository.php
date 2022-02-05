<?php

namespace App\Repository;

use App\Entity\{Campagne, Classe, Etape, EtapeAdversaire};
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EtapeAdversaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtapeAdversaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtapeAdversaire[]    findAll()
 * @method EtapeAdversaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtapeAdversaireRepository extends ServiceEntityRepository implements ExportInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtapeAdversaire::class);
    }

    public function getAdversaries()
    {
        $query = $this->createQueryBuilder('ea')
            ->select([
                'c.nom',
                'sum(ea.quantity) as quantite',
                'e.numero as etape',
                'ca.numero as campagne',
                'ca.difficile',
            ])
            ->join('ea.classe', 'c' )
            ->join('ea.etape', 'e')
            ->join('e.campagne', 'ca')
            ->addGroupBy('c.nom')
            ->addGroupBy('e.numero')
            ->addGroupBy('ca.numero')
            ->addGroupBy('ca.difficile')
            ->getQuery()
        ;
        return $query->getResult();
    }

    public function getTotalAdvesaireQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('ea')
        ->select('ea.etape')
        ->select('SUM(ea.quantite) as qte')
        ->groupBy('ea.etape')
        ;
    }

    public function getExportFilename()
    {
        return "EtapeAdversaire.csv";
    }

    public function getExport()
    {
        return $this->createQueryBuilder('ea')
            ->select([
                'cp.id as campagne',
                'e.numero as etape',
                'c.nom as classe',
                'el.nom as element',
                'ea.quantity',

            ])
            ->join('ea.etape', 'e')
            ->join('e.campagne', 'cp')
            ->join('ea.classe', 'c')
            ->join('ea.element', 'el')
            ->addOrderBy('cp.id', 'ASC')
            ->addOrderBy('e.numero', 'ASC')
            // ->addOrderBy('ea.quantity', 'DESC')
            ->getQuery()
            ->getResult()
        ;

    }


    // /**
    //  * @return EtapeAdversaire[] Returns an array of EtapeAdversaire objects
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
    public function findOneBySomeField($value): ?EtapeAdversaire
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
