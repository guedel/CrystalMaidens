<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\IngredientConstituant;
use PHPUnit\Framework\TestCase;

class IngredientConstituantTest extends TestCase
{
    use PrivateAttributeAccess;

    public const int DEFAULT_ID = 10;
    public const int DEFAULT_QUANTITY = 100;

    public static function buildIngredientConstituant(
        int $id = self::DEFAULT_ID,
        int $quantity = self::DEFAULT_QUANTITY
    ): IngredientConstituant {
        $return = (new IngredientConstituant())
            ->setQuantity($quantity)
        ;
        self::setPrivateAttribute($return, 'id', $id);
        return $return;
    }
    public function testIngredientConstituant(): void
    {
        $constituant = MaidenTest::buildMaiden();
        $ingredient = CrystalTest::buildCrystal();
        $test = self::buildIngredientConstituant()
            ->setConstituant($constituant)
            ->setIngredient($ingredient)
        ;
        $this->assertInstanceOf(IngredientConstituant::class, $test);
        $this->assertEquals(self::DEFAULT_ID, $test->getId());
        $this->assertEquals(self::DEFAULT_QUANTITY, $test->getQuantity());
        $this->assertEquals($constituant, $test->getConstituant());
        $this->assertEquals($ingredient, $test->getIngredient());
        $this->assertEquals(MaidenTest::DEFAULT_NAME . ' component', (string)$test);
    }
}
