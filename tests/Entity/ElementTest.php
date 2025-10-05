<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Element;
use PHPUnit\Framework\TestCase;

class ElementTest extends TestCase
{
    use PrivateAttributeAccess;

    public static function buildElement(int $id, string $nom): Element
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
}
