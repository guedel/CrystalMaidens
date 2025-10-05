<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\EtapeItem;
use PHPUnit\Framework\TestCase;

class EtapeItemTest extends TestCase
{
    use PrivateAttributeAccess;
    public static function buildEtapeItem(int $id): EtapeItem
    {
        $etapeItem = new EtapeItem();
        self::setPrivateAttribute($etapeItem, 'id', $id);
        return $etapeItem;
    }
    public function testEtapeItem(): void
    {

        $etapeItem = $this->buildEtapeItem(1)
            ->setTaux('9.25')
        ;
        $this->assertInstanceOf(EtapeItem::class, $etapeItem);
        $this->assertEquals(1, $etapeItem->getId());
        $this->assertEquals('9.25', $etapeItem->getTaux());
    }
}
