<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Item;
use App\Tests\Entity\ClasseTest;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public const DEFAULT_NAME = 'bel item';
    public static function buildItem(string $nom = self::DEFAULT_NAME): Item
    {
        return (new Item())
            ->setNom($nom);
    }
    public function testItem(): void
    {
        $classe = ClasseTest::buildClasse(1, 'la classe');
        $emplacement = EmplacementTest::buildEmplacement(2, 'bel emplacement');
        $maiden = MaidenTest::buildMaiden('zora');
        $description = "une description parmi d'autres";
        $item = self::buildItem()
            ->setClasse($classe)
            ->setEmplacement($emplacement)
            ->setDescription($description)
            ->setMaiden($maiden)
        ;

        self::assertInstanceOf(Item::class, $item);
        $this->assertEquals($classe, $item->getClasse());
        $this->assertEquals($emplacement, $item->getEmplacement());
        $this->assertEquals($description, $item->getDescription());
        $this->assertEquals($maiden, $item->getMaiden());
        $this->assertEquals(sprintf('%s\'s item for %s', $emplacement->getNom(), $classe->getNom()),
            $item->getIngredientType()
        );
    }
}
