<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Emplacement;
use PHPUnit\Framework\TestCase;

class EmplacementTest extends TestCase
{
    public const int DEFAULT_ID = 12;
    public const string DEFAULT_NAME = 'emplacement';

    use PrivateAttributeAccess;

    public static function buildEmplacement(int $id = self::DEFAULT_ID, string $nom = self::DEFAULT_NAME): Emplacement
    {
        $emplacement = (new Emplacement())
        ->setNom($nom);
        self::setPrivateAttribute($emplacement, 'id', $id);
        return $emplacement;
    }

    public function testEmplacement(): void
    {
        $emplacement = self::buildEmplacement(1, 'emplacement');
        $this->assertInstanceOf(Emplacement::class, $emplacement);
        $this->assertEquals('emplacement', $emplacement->getNom());
        $this->assertEquals(1, $emplacement->getId());
        $this->assertEquals('emplacement', (string)$emplacement);
    }

    public function testCollections(): void
    {
        $emplacements = self::buildEmplacement();
        $item = ItemTest::buildItem();
        $this->assertCount(0, $emplacements->getItems());
        $emplacements->addItem($item);
        $this->assertCount(1, $emplacements->getItems());
        $emplacements->removeItem($item);
        $this->assertCount(0, $emplacements->getItems());
    }
}
