<?php

namespace App\DataFixtures;

use App\Entity\{BossIngredient, IngredientLevel};
use Doctrine\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;

class BossIngredientFixtures extends CsvFileFixtures
{
    private static array $levels = [
        0 => "Other",
        1 => 'Basic',
        2 => 'Refined',
        3 => 'Master',
    ];

    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $this->logger->info(__METHOD__);
        $levels = [];
        foreach (self::$levels as $id => $level) {
            $entity = $manager->getRepository(IngredientLevel::class)->findOneBy(['nom' => $level]);
            if (! $entity instanceof IngredientLevel) {
                $entity = (new IngredientLevel())
                    ->setId($id)
                    ->setNom($level)
                ;
                $manager->persist($entity);
            }
            $levels[$entity->getNom()] = $entity;
        }
        $manager->flush();

        foreach($this->doLoad('BossIngredients.csv') as $row) {
            $level = $levels[$row[1]];
            if (! $level instanceof IngredientLevel) {
                throw new \Exception("IngredientLevel with name '$row[1]' does not exist");
            }
            $entity =  $manager->getRepository(BossIngredient::class)->findOneBy(['nom' => $row[0]]);
            if (! $entity instanceof BossIngredient) {
                $entity = (new BossIngredient())
                    ->setNom($row[0])
                ;
                $manager->persist($entity);
            }
            $entity->setLevel($level);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            AppFixtures::class,
        ];
    }
}
