<?php

namespace App\Entity;

use App\Repository\MaidenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaidenRepository::class)
 */
class Maiden extends Ingredient
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nickname;

    public function __toString()
    {
        return $this->getNom() . ' (' . $this->nickname . ')';
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }
}
