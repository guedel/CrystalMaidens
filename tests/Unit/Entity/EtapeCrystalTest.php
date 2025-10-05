<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\EtapeCrystal;
use PHPUnit\Framework\TestCase;

class EtapeCrystalTest extends TestCase
{
    use PrivateAttributeAccess;

    public const int DEFAULT_ID = 7;
    public const int DEFAULT_MINIMUM = 5;
    public const int DEFAULT_MAXIMUM = 10;


    public static function buildEtapeCrystal(
        int $id = self::DEFAULT_ID,
        int $minimum = self::DEFAULT_MINIMUM,
        int $maximum = self::DEFAULT_MAXIMUM
    ): EtapeCrystal {
        $etapeCrystal = (new EtapeCrystal())
            ->setMinimum($minimum)
            ->setMaximum($maximum)
        ;
        self::setPrivateAttribute($etapeCrystal, 'id', self::DEFAULT_ID);
        return $etapeCrystal;
    }
    public function testEtapeCrystal(): void
    {
        $crystal = CrystalTest::buildCrystal()
            ->setNom('bleu')
        ;
        $etape = EtapeTest::buildEtape();
        $etapeCrystal = $this->buildEtapeCrystal(minimum: 8, maximum: 12)
            ->setEtape($etape)
            ->setCrystal($crystal)
        ;
        $this->assertInstanceOf(EtapeCrystal::class, $etapeCrystal);
        $this->assertEquals(self::DEFAULT_ID, $etapeCrystal->getId());
        $this->assertEquals(8, $etapeCrystal->getMinimum());
        $this->assertEquals(12, $etapeCrystal->getMaximum());
        $this->assertEquals($crystal, $etapeCrystal->getCrystal());
        $this->assertEquals($etape, $etapeCrystal->getEtape());
        $this->assertEquals('bleu (8 to 12)', (string) $etapeCrystal);
    }
}
