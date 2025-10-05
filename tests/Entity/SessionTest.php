<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Session;
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    use PrivateAttributeAccess;

    public static function buildSession(string $serverName, string $playerName): Session
    {
        return (new Session())
            ->setPlayerName($playerName)
            ->setServerName($serverName);
    }

    public function testSession(): void
    {
        $session = self::buildSession('server', 'player');
        self::setPrivateAttribute($session, 'id', 67);
        $session->setBonusCoins(500);
        $this->assertInstanceOf(Session::class, $session);
        $this->assertEquals('server', $session->getServerName());
        $this->assertEquals('player', $session->getPlayerName());
        $this->assertEquals(500, $session->getBonusCoins());
        $this->assertEquals(67,$session->getId());
    }
}
