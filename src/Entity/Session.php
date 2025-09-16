<?php declare(strict_types=1);

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    private ?string $playerName = null;

    #[ORM\Column(type: 'string', length: 50)]
    private ?string $serverName = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $bonusCoins = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayerName(): ?string
    {
        return $this->playerName;
    }

    public function setPlayerName(string $playerName): self
    {
        $this->playerName = $playerName;

        return $this;
    }

    public function getServerName(): ?string
    {
        return $this->serverName;
    }

    public function setServerName(string $serverName): self
    {
        $this->serverName = $serverName;

        return $this;
    }

    public function getBonusCoins(): ?int
    {
        return $this->bonusCoins;
    }

    public function setBonusCoins(?int $bonusCoins): self
    {
        $this->bonusCoins = $bonusCoins;

        return $this;
    }
}
