<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Maiden;
use PHPUnit\Framework\TestCase;

class MaidenTest extends TestCase
{
    public const string DEFAULT_NAME = 'maiden';

    public static function buildMaiden(string $nom = self::DEFAULT_NAME): Maiden
    {
        return (new Maiden())
            ->setNom($nom)
            ->setNickname($nom)
        ;
    }

    public function testMaiden(): void
    {
        $nom = 'belle maiden';
        $classe = ClasseTest::buildClasse(1, 'la grande classe');
        $element = ElementTest::buildElement(2, 'bel élément');
        $rarity = RareteTest::buildRarete(3, 'quelle rareté');
        $maiden = self::buildMaiden($nom)
            ->setClasse($classe)
            ->setElement($element)
            ->setRarity($rarity)
        ;
        $this->assertEquals($nom, $maiden->getNom());
        $this->assertEquals($nom, $maiden->getNickname());
        $this->assertEquals($classe, $maiden->getClasse());
        $this->assertEquals($element, $maiden->getElement());
        $this->assertEquals($rarity, $maiden->getRarity());

        $this->assertEquals('Maiden', $maiden->getIngredientType());
        $this->assertEquals(sprintf('%s (%s)', $nom, $nom), (string)$maiden);
    }

    public function testEtapeFragmentsCollection(): void
    {
        $maiden = self::buildMaiden(self::DEFAULT_NAME);
        $etapeFragment = EtapeFragmentTest::buildEtapeFragment($maiden);
        $this->assertCount(0, $maiden->getEtapeFragments());
        $maiden->addEtapeFragment($etapeFragment);
        $this->assertCount(1, $maiden->getEtapeFragments());
        $maiden->removeEtapeFragment($etapeFragment);
        $this->assertCount(0, $maiden->getEtapeFragments());
    }
}
