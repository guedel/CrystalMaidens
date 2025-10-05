<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\BossIngredient;
use App\Entity\Ingredient;
use PHPUnit\Framework\TestCase;

class BossIngredientTest extends TestCase
{
    use PrivateAttributeAccess;

    const DEFAULT_ID = 4;
    const DEFAULT_NAME = 'boss ingredient';

    public static function buildBossIngredient(int $id = self::DEFAULT_ID, string $nom = self::DEFAULT_NAME): BossIngredient
    {
        $bossIngredient = new BossIngredient();
        $bossIngredient->setNom($nom);
        self::setPrivateAttribute($bossIngredient, 'id', $id, Ingredient::class);
        return $bossIngredient;
    }

    public function testSimpleBossIngredient(): void
    {
        $id = 20;
        $nom = 'boss ingredient';
        $bossIngredient = $this->buildBossIngredient($id, $nom);
        self::assertEquals($id, $bossIngredient->getId());
        self::assertEquals($nom, $bossIngredient->getNom());
    }

    public function testBossIngredientWithLevel(): void
    {
        $id = 30;
        $nom = 'boss ingredient';
        $levelName = 'unique level';
        $bossIngredient = $this->buildBossIngredient($id, $nom);
        $level = IngredientLevelTest::buildIngredientLevel(10, $levelName);
        $bossIngredient->setLevel($level);
        $this->assertEquals($level, $bossIngredient->getLevel());
        self::assertEquals('Ingredient ' . $levelName, $bossIngredient->getIngredientType());
    }
}
