<?php

namespace App\Repository;

use App\Entity\IngredientLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IngredientLevel|null find($id, $lockMode = null, $lockVersion = null)
 * @method IngredientLevel|null findOneBy(array $criteria, array $orderBy = null)
 * @method IngredientLevel[]    findAll()
 * @method IngredientLevel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IngredientLevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IngredientLevel::class);
    }
}
