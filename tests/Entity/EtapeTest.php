<?php declare(strict_types=1);

namespace Entity;

use App\Entity\Etape;
use PHPUnit\Framework\TestCase;

class EtapeTest extends TestCase
{
    public static function buildEtape(int $numero): Etape
    {

        return (new Etape())
            ->setNumero($numero)
            ->setId($numero)
        ;
    }

    public function testEtape(): void
    {
        $etape = self::buildEtape(1)
            ->setBoss(true)
            ->setEnergie(10)
            ->setExperience(400)
            ->setExpMaiden(2000)
            ->setCoins(1500)
            ->setMinGachaOrbs(3)
            ->setMaxGachaOrbs(15)
        ;
        $this->assertInstanceOf(Etape::class, $etape);
        $this->assertEquals(1, $etape->getNumero());
        $this->assertEquals(1, $etape->getId());
        $this->assertEquals(true, $etape->getBoss());
        $this->assertEquals(10, $etape->getEnergie());
        $this->assertEquals(400, $etape->getExperience());
        $this->assertEquals(2000, $etape->getExpMaiden());
        $this->assertEquals(1500, $etape->getCoins());
        $this->assertEquals(3, $etape->getMinGachaOrbs());
        $this->assertEquals(15, $etape->getMaxGachaOrbs());
    }
}
