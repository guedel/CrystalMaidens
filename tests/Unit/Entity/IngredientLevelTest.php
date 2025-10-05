<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\IngredientLevel;
use PHPUnit\Framework\TestCase;

class IngredientLevelTest extends TestCase
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
        self::assertEquals($name, (string)$ingredientLevel);
    }
}
