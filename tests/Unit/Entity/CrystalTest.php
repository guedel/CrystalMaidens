<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\Crystal;
use PHPUnit\Framework\TestCase;

class CrystalTest extends TestCase
{
    public static function buildCrystal(): Crystal
    {
        return new Crystal();
    }
    public function testCrystal(): void
    {
        $element = ElementTest::buildElement();
        $crystal = $this->buildCrystal()
            ->setNature($element)
        ;

        $this->assertInstanceOf(Crystal::class, $crystal);
        $this->assertEquals('Crystal', $crystal->getIngredientType());
        $this->assertEquals($element, $crystal->getNature());
    }

    public function testCollections(): void
    {
        $crystal = $this->buildCrystal();
        $etapeCrystal = EtapeCrystalTest::buildEtapeCrystal();
        $this->assertCount(0, $crystal->getEtapeCrystals());
        $crystal->addEtapeCrystal($etapeCrystal);
        $this->assertCount(1, $crystal->getEtapeCrystals());
        $crystal->removeEtapeCrystal($etapeCrystal);
        $this->assertCount(0, $crystal->getEtapeCrystals());
    }
}
