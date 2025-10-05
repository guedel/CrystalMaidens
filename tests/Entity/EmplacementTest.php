<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Emplacement;
use PHPUnit\Framework\TestCase;

class EmplacementTest extends TestCase
{
    use PrivateAttributeAccess;

    public static function buildEmplacement(int $id, string $nom): Emplacement
    {
        $emplacement = (new Emplacement())
        ->setNom($nom);
        self::setPrivateAttribute($emplacement, 'id', $id);
        return $emplacement;
    }

    public function testEmplacement(): void
    {
        $emplacement = self::buildEmplacement(1, 'emplacement');
        $this->assertInstanceOf(Emplacement::class, $emplacement);
        $this->assertEquals('emplacement', $emplacement->getNom());
        $this->assertEquals(1, $emplacement->getId());
    }
}
