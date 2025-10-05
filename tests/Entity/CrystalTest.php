<?php declare(strict_types=1);

namespace Entity;

use App\Entity\Crystal;
use App\Tests\Entity\ElementTest;
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
}
