<?php

namespace App\Entity;

use App\Repository\EtapeAdversaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtapeAdversaireRepository::class)]
class EtapeAdversaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Element::class, inversedBy: 'etapeAdversaires')]
    private $element;

    #[ORM\ManyToOne(targetEntity: Classe::class, inversedBy: 'etapeAdversaires')]
    private $classe;

    #[ORM\ManyToOne(targetEntity: Etape::class, inversedBy: 'etapeAdversaires')]
    private $etape;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    public function __toString()
    {
        return $this->quantity . ' ' . $this->classe->getNom() . ' ' . $this->element->getNom();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
