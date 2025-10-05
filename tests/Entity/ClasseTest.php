<?php declare(strict_types=1);

namespace App\Tests\Entity;

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
    }
}
