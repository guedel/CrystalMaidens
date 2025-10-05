<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\Campagne;
use App\Tests\Entity\TestEntityBase;
use PHPUnit\Framework\TestCase;

class CampagneTest extends TestCase
{
    public const int DEFAULT_NUM = 3;
    public static function buildCampagne(int $numero = self::DEFAULT_NUM, bool $difficile = false): Campagne
    {
        return (new Campagne())
            ->setId($numero)
            ->setNumero($numero)
            ->setDifficile($difficile);
    }

    public function testCampagne(): void
    {
        $campagne = self::buildCampagne(1, true);
        $this->assertInstanceOf(Campagne::class, $campagne);
        $this->assertEquals(1, $campagne->getId());
        $this->assertEquals(1, $campagne->getNumero());
        $this->assertTrue($campagne->getDifficile());
        $this->assertEquals('1 hard', (string) $campagne);
    }

    public function testCollections(): void
    {
        $etape = EtapeTest::buildEtape();
        $campagne = self::buildCampagne();
        $this->assertCount(0, $campagne->getEtapes());
        $campagne->addEtape($etape);
        $this->assertCount(1, $campagne->getEtapes());
        $campagne->removeEtape($etape);
        $this->assertCount(0, $campagne->getEtapes());
    }
}
