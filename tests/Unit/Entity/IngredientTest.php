<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;


use App\Entity\Ingredient;
use PHPUnit\Framework\TestCase;

class IngredientTest extends TestCase
{
    public const int DEFAULT_ID = 18;
    public const string DEFAULT_NAME = 'ingredient';

    use PrivateAttributeAccess;
    public static function buildIngredient(int $id = self::DEFAULT_ID, string $name = self::DEFAULT_NAME): Ingredient
    {
        $ingredient = (new Ingredient())
            ->setNom($name)
        ;
        self::setPrivateAttribute($ingredient, 'id', $id);
        return $ingredient;
    }
    public function testIngredient(): void
    {
        $ingredient = self::buildIngredient(2, 'special test');
        $this->assertEquals(2, $ingredient->getId());
        $this->assertEquals('special test', $ingredient->getNom());
        $this->assertEquals('Ingredient', $ingredient->getIngredientType());
        $this->assertEquals('special test', (string)$ingredient);
    }

    public function testConstituantsCollection() : void
    {
        $ingredient = self::buildIngredient();
        $constituant = IngredientConstituantTest::buildIngredientConstituant();
        $this->assertCount(0, $ingredient->getConstituants());
        $ingredient->addConstituant($constituant);
        $this->assertCount(1, $ingredient->getConstituants());
        $ingredient->removeConstituant($constituant);
        $this->assertCount(0, $ingredient->getConstituants());
    }

    public function testIngredientsCollection() : void
    {
        $ingredient = self::buildIngredient();
        $ingredientToAdd = IngredientConstituantTest::buildIngredientConstituant();
        $this->assertCount(0, $ingredient->getIngredients());
        $ingredient->addIngredient($ingredientToAdd);
        $this->assertCount(1, $ingredient->getIngredients());
        $ingredient->removeIngredient($ingredientToAdd);
        $this->assertCount(0, $ingredient->getIngredients());
    }
}
