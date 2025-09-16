<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\Crystal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Crystal>
 *
 * @method Crystal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Crystal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Crystal[]    findAll()
 * @method Crystal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CrystalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Crystal::class);
    }
}
