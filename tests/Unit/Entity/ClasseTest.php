<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\Classe;
use PHPUnit\Framework\TestCase;

class ClasseTest extends TestCase
{
    use PrivateAttributeAccess;

    const DEFAULT_ID = 3;
    const DEFAULT_NAME = 'the class';

    public static function buildClasse(int $id = self::DEFAULT_ID, string $nom = self::DEFAULT_NAME): Classe
    {
        $classe = new Classe();
        $classe->setNom($nom);
        self::setPrivateAttribute($classe, 'id', $id);
        return $classe;
    }

    public function testClass(): void
    {
        $id = 20;
        $nom = "classe";
        $classe = self::buildClasse($id, $nom);
        $this->assertInstanceOf(Classe::class, $classe);
        $this->assertEquals($id, $classe->getId());
        $this->assertEquals($nom, $classe->getNom());
        $this->assertEquals($nom, (string) $classe);
    }

    public function testCollections(): void
    {
        $classe = self::buildClasse(self::DEFAULT_ID);
        $etapeAdv = EtapeAdversaireTest::buildEtapeAdversaire();
        $this->assertCount(0, $classe->getEtapeAdversaires());
        $classe->addEtapeAdversaire($etapeAdv);
        $this->assertCount(1, $classe->getEtapeAdversaires());
        $classe->removeEtapeAdversaire($etapeAdv);
        $this->assertCount(0, $classe->getEtapeAdversaires());
    }
}
