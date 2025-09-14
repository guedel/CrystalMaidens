<?php

namespace App\Repository;

use App\Entity\Rarete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rarete|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rarete|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rarete[]    findAll()
 * @method Rarete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RareteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rarete::class);
    }
}
