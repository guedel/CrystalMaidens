<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\EtapeFragment;
use App\Entity\Maiden;
use PHPUnit\Framework\TestCase;

class EtapeFragmentTest extends TestCase
{
    public const DEFAULT_Id = 14;

    use PrivateAttributeAccess;
    public static function buildEtapeFragment(Maiden $maiden, int $mini=10, int $maxi=20): EtapeFragment
    {
        $return = (new EtapeFragment())
            ->setMaiden($maiden)
            ->setMaximum($maxi)
            ->setMinimum($mini)
        ;
        self::setPrivateAttribute($return, 'id', self::DEFAULT_Id);
        return $return;
    }

    public function testEtapeFragment(): void
    {
        $maidenName = 'maiden from fragment';
        $maiden = MaidenTest::buildMaiden($maidenName);
        $fragment = self::buildEtapeFragment($maiden);
        $this->assertInstanceOf(EtapeFragment::class, $fragment);
        $this->assertEquals($maiden, $fragment->getMaiden());
        $this->assertEquals(10, $fragment->getMinimum());
        $this->assertEquals(20, $fragment->getMaximum());
        $this->assertEquals(self::DEFAULT_Id, $fragment->getId());
        $this->assertEquals($maidenName . ' (10 to 20)', (string)$fragment);
    }
}
