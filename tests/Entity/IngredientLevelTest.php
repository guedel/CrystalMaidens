<?php declare(strict_types=1);

namespace Entity;

use App\Entity\IngredientLevel;
use App\Tests\Entity\TestEntityBase;
use PHPUnit\Framework\TestCase;

class IngredientLevelTest extends TestEntityBase
{
    public static function buildIngredientLevel(int $id, string $nom): IngredientLevel
    {
        return (new IngredientLevel())
            ->setId($id)
            ->setNom($nom)
            ;
    }
    public function testIngredientLevel(): void
    {
        $id = 10;
        $name = 'level';
        $ingredientLevel = $this->buildIngredientLevel($id, $name);
        $this->assertInstanceOf(IngredientLevel::class, $ingredientLevel);
        self::assertEquals($id, $ingredientLevel->getId());
        self::assertEquals($name, $ingredientLevel->getNom());
        self::assertEquals($name,  (string)$ingredientLevel);
    }
}
