<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Rarete;
use PHPUnit\Framework\TestCase;

class RareteTest extends TestCase
{
    use PrivateAttributeAccess;

    public static function buildRarete(int $id, string $nom): Rarete
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
}
