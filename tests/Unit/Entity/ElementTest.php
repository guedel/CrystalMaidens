<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\Element;
use PHPUnit\Framework\TestCase;

class ElementTest extends TestCase
{
    use PrivateAttributeAccess;

    public const DEFAULT_ID = 1;
    public const DEFAULT_NAME = 'element';

    public static function buildElement(int $id = self::DEFAULT_ID, string $nom = self::DEFAULT_NAME): Element
    {
        $element = new Element();
        $element->setNom($nom);
        self::setPrivateAttribute($element, "id", $id);
        return $element;
    }

    public function testElement(): void
    {
        $id = 50;
        $nom = 'element special';
        $element = self::buildElement($id, $nom);
        $this->assertInstanceOf(Element::class, $element);
        $this->assertEquals($id, $element->getId());
        $this->assertEquals($nom, $element->getNom());
        $this->assertEquals($nom, (string)$element);
    }

    public function testCollections(): void
    {
        $element = self::buildElement(self::DEFAULT_ID, self::DEFAULT_NAME);
        $etapeAdv = EtapeAdversaireTest::buildEtapeAdversaire();
        $this->assertCount(0, $element->getEtapeAdversaires());
        $element->addEtapeAdversaire($etapeAdv);
        $this->assertCount(1, $element->getEtapeAdversaires());
        $element->removeEtapeAdversaire($etapeAdv);
        $this->assertCount(0, $element->getEtapeAdversaires());
    }
}
