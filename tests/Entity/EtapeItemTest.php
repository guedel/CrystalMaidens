<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\EtapeItem;
use PHPUnit\Framework\TestCase;

class EtapeItemTest extends TestCase
{
    use PrivateAttributeAccess;

    const DEFAULT_ID = 5;

    public static function buildEtapeItem(int $id = self::DEFAULT_ID): EtapeItem
    {
        $etapeItem = new EtapeItem();
        self::setPrivateAttribute($etapeItem, 'id', $id);
        return $etapeItem;
    }
    public function testEtapeItem(): void
    {
        $item = ItemTest::buildItem('autre item');
        $etape = EtapeTest::buildEtape(2);
        $rarity = RareteTest::buildRarete(3, 'rarete');
        $etapeItem = $this->buildEtapeItem(1)
            ->setTaux('9.25')
            ->setItem($item)
            ->setEtape($etape)
            ->setRarity($rarity)
        ;
        $this->assertInstanceOf(EtapeItem::class, $etapeItem);
        $this->assertEquals(1, $etapeItem->getId());
        $this->assertEquals('9.25', $etapeItem->getTaux());
        $this->assertEquals($item, $etapeItem->getItem());
        $this->assertEquals($etape, $etapeItem->getEtape());
        $this->assertEquals($rarity, $etapeItem->getRarity());
        $this->assertEquals('autre item at 9.25 %', (string)$etapeItem);
    }
}
