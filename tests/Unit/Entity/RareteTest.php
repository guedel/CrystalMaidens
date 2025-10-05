<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\Rarete;
use PHPUnit\Framework\TestCase;

class RareteTest extends TestCase
{
    use PrivateAttributeAccess;

    public const int DEFAULT_ID = 10;
    public const string DEFAULT_NAME = 'rarete';

    public static function buildRarete(int $id = self::DEFAULT_ID, string $nom = self::DEFAULT_NAME): Rarete
    {
        $rarete = new Rarete();
        $rarete->setNom($nom);
        self::setPrivateAttribute($rarete, 'id', $id);
        return $rarete;
    }

    public function testRarete(): void
    {
        $nom = "rarete";
        $id = 10;
        $rarete = self::buildRarete(10, $nom);
        $this->assertInstanceOf(Rarete::class, $rarete);
        $this->assertEquals($nom, $rarete->getNom());
        $this->assertEquals($id, $rarete->getId());
        $this->assertEquals($nom, (string) $rarete);
    }

    public function testEtapeItemsCollection(): void
    {
        $rarete = self::buildRarete();
        $etapeItem = EtapeItemTest::buildEtapeItem();
        $this->assertCount(0, $rarete->getEtapeItems());
        $rarete->addEtapeItem($etapeItem);
        $this->assertCount(1, $rarete->getEtapeItems());
        $rarete->removeEtapeItem($etapeItem);
        $this->assertCount(0, $rarete->getEtapeItems());
    }
}
