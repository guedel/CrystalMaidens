<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\Etape;
use PHPUnit\Framework\TestCase;

class EtapeTest extends TestCase
{
    const DEFAULT_NUM = 10;
    public static function buildEtape(int $numero = self::DEFAULT_NUM): Etape
    {

        return (new Etape())
            ->setNumero($numero)
            ->setId($numero)
        ;
    }

    public function testEtape(): void
    {
        $campagne = CampagneTest::buildCampagne(2);
        $etape = self::buildEtape(1)
            ->setBoss(true)
            ->setEnergie(10)
            ->setExperience(400)
            ->setExpMaiden(2000)
            ->setCoins(1500)
            ->setMinGachaOrbs(3)
            ->setMaxGachaOrbs(15)
            ->setCampagne($campagne)
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
        $this->assertEquals('C 2 E 1', (string)$etape);
    }

    public function testEtapeFragmentCollection(): void
    {
        $etape = self::buildEtape();
        $maiden = MaidenTest::buildMaiden();
        $etapeFragment = EtapeFragmentTest::buildEtapeFragment($maiden);
        $this->assertCount(0, $etape->getEtapeFragments());
        $etape->addEtapeFragment($etapeFragment);
        $this->assertCount(1, $etape->getEtapeFragments());
        $etape->removeEtapeFragment($etapeFragment);
        $this->assertCount(0, $etape->getEtapeFragments());
    }

    public function testEtapeCrystalCollection(): void
    {
        $etape = self::buildEtape();
        $etapeCrystal = EtapeCrystalTest::buildEtapeCrystal();
        $this->assertCount(0, $etape->getEtapeCrystals());
        $etape->addEtapeCrystal($etapeCrystal);
        $this->assertCount(1, $etape->getEtapeCrystals());
        $etape->removeEtapeCrystal($etapeCrystal);
        $this->assertCount(0, $etape->getEtapeCrystals());
    }

    public function testEtapeAdversaireCollection(): void
    {
        $etape = self::buildEtape();
        $etapeAdv = EtapeAdversaireTest::buildEtapeAdversaire();
        $this->assertCount(0, $etape->getEtapeAdversaires());
        $etape->addEtapeAdversaire($etapeAdv);
        $this->assertCount(1, $etape->getEtapeAdversaires());
        $etape->removeEtapeAdversaire($etapeAdv);
        $this->assertCount(0, $etape->getEtapeAdversaires());
    }

    public function testEtapeItemCollection(): void
    {
        $etape = self::buildEtape();
        $etapeItem = EtapeItemTest::buildEtapeItem();
        $this->assertCount(0, $etape->getEtapeItems());
        $etape->addEtapeItem($etapeItem);
        $this->assertCount(1, $etape->getEtapeItems());
        $etape->removeEtapeItem($etapeItem);
        $this->assertCount(0, $etape->getEtapeItems());
    }
}
