<?php

namespace App\Entity;

use App\Repository\EtapeItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtapeItemRepository::class)
 */
class EtapeItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Etape::class, inversedBy="etapeItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etape;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class, inversedBy="etapeItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $item;

    /**
     * @ORM\ManyToOne(targetEntity=Rarete::class, inversedBy="etapeItems")
     */
    private $rarity;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $taux;

    public function __toString()
    {
        return $this->item->getNom() . ' at ' . $this->taux . ' %';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtape(): ?Etape
    {
        return $this->etape;
    }

    public function setEtape(?Etape $etape): self
    {
        $this->etape = $etape;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

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

    public function getTaux(): ?string
    {
        return $this->taux;
    }

    public function setTaux(?string $taux): self
    {
        $this->taux = $taux;

        return $this;
    }
}
