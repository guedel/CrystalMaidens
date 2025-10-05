<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\EtapeAdversaire;
use PHPUnit\Framework\TestCase;

class EtapeAdversaireTest extends TestCase
{
    use PrivateAttributeAccess;

    public const int DEFAULT_ID = 2;
    public const int DEFAULT_QUANTITY = 4;

    public static function buildEtapeAdversaire(
        int $id = self::DEFAULT_ID,
        int $quantity = self::DEFAULT_QUANTITY
    ): EtapeAdversaire {
        $etapeAdv = (new EtapeAdversaire())
            ->setQuantity($quantity);
        self::setPrivateAttribute($etapeAdv, 'id', $id);
        return $etapeAdv;
    }
    public function testEtapeAdversaire(): void
    {
        $element = ElementTest::buildElement();
        $classe = ClasseTest::buildClasse();
        $etape = EtapeTest::buildEtape();
        $etapeAdv = self::buildEtapeAdversaire(1, 50)
            ->setElement($element)
            ->setClasse($classe)
            ->setEtape($etape);
        ;
        $this->assertInstanceOf(EtapeAdversaire::class, $etapeAdv);
        $this->assertEquals(1, $etapeAdv->getId());
        $this->assertEquals(50, $etapeAdv->getQuantity());
        $this->assertEquals($element, $etapeAdv->getElement());
        $this->assertEquals($classe, $etapeAdv->getClasse());
        $this->assertEquals($etape, $etapeAdv->getEtape());
        $this->assertEquals('50 ' . ClasseTest::DEFAULT_NAME . ' ' . ElementTest::DEFAULT_NAME, (string)$etapeAdv);
    }
}
