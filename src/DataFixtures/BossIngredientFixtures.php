<?php

namespace App\DataFixtures;

use App\Entity\{BossIngredient, IngredientLevel};
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BossIngredientFixtures extends CsvFileFixtures
{
    private static $levels = [
        'Basic',
        'Refined',
        'Master',
    ];

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::$levels as $level) {
            $entity = $manager->getRepository(IngredientLevel::class)->findOneBy(['nom' => $level]);
            if (! $entity instanceof IngredientLevel) {
                $entity = (new IngredientLevel())
                    ->setNom($level)
                ;
            }
        }
        $manager->flush();

        foreach($this->doLoad('BossIngredients.csv') as $row) {
            $level = $manager->getRepository(IngredientLevel::class)->findOneBy(['nom' => $row[1]]);
            if (! $level instanceof IngredientLevel) {
                continue;
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

    public function getDependencies()
    {
        return [
            CrystalFixtures::class,
        ];
    }
}
