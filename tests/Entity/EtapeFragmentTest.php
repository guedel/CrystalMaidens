<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\EtapeFragment;
use App\Entity\Maiden;
use PHPUnit\Framework\TestCase;

class EtapeFragmentTest extends TestCase
{
    public static function buildEtapeFragment(Maiden $maiden, int $mini=10, int $maxi=20): EtapeFragment
    {
        return (new EtapeFragment())
            ->setMaiden($maiden)
            ->setMaximum($maxi)
            ->setMinimum($mini)
        ;
    }

    public function testEtapeFragment(): void
    {
        $maiden = MaidenTest::buildMaiden('maiden from fragment');
        $fragment = self::buildEtapeFragment($maiden);
        $this->assertInstanceOf(EtapeFragment::class, $fragment);
        $this->assertEquals($maiden, $fragment->getMaiden());
        $this->assertEquals(10, $fragment->getMinimum());
        $this->assertEquals(20, $fragment->getMaximum());
    }
}
