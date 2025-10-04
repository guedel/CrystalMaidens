<?php declare(strict_types=1);

namespace Entity;

use App\Entity\Campagne;
use App\Tests\Entity\TestEntityBase;
use PHPUnit\Framework\TestCase;

class CampagneTest extends TestEntityBase
{
    public static function buildCampagne(int $numero, bool $difficile = false): Campagne
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
    }
}
