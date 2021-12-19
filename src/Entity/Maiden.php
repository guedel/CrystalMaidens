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

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $classe;

    /**
     * @ORM\ManyToOne(targetEntity=Element::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $element;

    /**
     * @ORM\ManyToOne(targetEntity=Rarete::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $rarity;

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

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getElement(): ?Element
    {
        return $this->element;
    }

    public function setElement(?Element $element): self
    {
        $this->element = $element;

        return $this;
    }

    public function getRarity(): ?Rarete
    {
        return $this->rarity;
    }

    public function setRarity(?Rarete $rarity): self
    {
        $this->rarity = $rarity;

        return $this;
    }
}
