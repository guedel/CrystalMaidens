<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\{Ingredient, IngredientConstituant };
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientConstituantFixtures extends CsvFileFixtures
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->doLoad('IngredientConstituant.csv') as $row) {
            $ingredient = $manager->getRepository(Ingredient::class)->findOneBy(['nom' => $row[0]]);
            $constituant = $manager->getRepository(Ingredient::class)->findOneBy(['nom' => $row[1]]);
            if (! $ingredient instanceof Ingredient || ! $constituant instanceof Ingredient) {
                throw new \Exception("One of Ingredient '$row[0]' or '$row[1]' does not exist");
            }
            $entity = $manager->getRepository(IngredientConstituant::class)
                ->findOneBy(['ingredient' => $ingredient, 'constituant' => $constituant]);
            if (! $entity instanceof IngredientConstituant) {
                $entity = (new IngredientConstituant())
                    ->setIngredient($ingredient)
                    ->setConstituant($constituant)
                ;
                $manager->persist($entity);
            }
            $entity->setQuantity($row[2]);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            MaidenFixtures::class,
            ItemsFixtures::class,
            BossIngredientFixtures::class,
            CrystalFixtures::class,
        ];
    }

    protected function convert(int $index, mixed $value): mixed
    {
        return match ($index) {
            2 => self::valOptInt($value),
            default => $value
        };
    }
}
