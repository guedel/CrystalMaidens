<?php declare(strict_types=1);

namespace Entity;

use App\Entity\EtapeCrystal;
use App\Tests\Entity\ClasseTest;
use App\Tests\Entity\EtapeTest;
use App\Tests\Entity\PrivateAttributeAccess;
use PHPUnit\Framework\TestCase;

class EtapeCrystalTest extends TestCase
{
    public const DEFAULT_ID = 7;
    public const DEFAULT_MINIMUM = 5;
    public const DEFAULT_MAXIMUM = 10;

    use PrivateAttributeAccess;

    public static function buildEtapeCrystal(
        int $id = self::DEFAULT_ID,
        int $minimum = self::DEFAULT_MINIMUM,
        int $maximum = self::DEFAULT_MAXIMUM
    ): EtapeCrystal
    {
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
