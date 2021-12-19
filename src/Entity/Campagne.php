<?php

namespace App\Entity;

use App\Repository\CampagneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampagneRepository::class)
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(columns={"numero", "difficile"})})
 */
class Campagne
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="boolean")
     */
    private $difficile;

    /**
     * @ORM\OneToMany(targetEntity=Etape::class, mappedBy="campagne", orphanRemoval=true)
     */
    private $etapes;

    public function __construct()
    {
        $this->etapes = new ArrayCollection();
    }

    public function __toString()
    {
        return (string)$this->numero . ' ' . ($this->difficile ? 'hard' : 'easy');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getDifficile(): ?bool
    {
        return $this->difficile;
    }

    public function setDifficile(bool $difficile): self
    {
        $this->difficile = $difficile;

        return $this;
    }

    /**
     * @return Collection|Etape[]
     */
    public function getEtapes(): Collection
    {
        return $this->etapes;
    }

    public function addEtape(Etape $etape): self
    {
        if (!$this->etapes->contains($etape)) {
            $this->etapes[] = $etape;
            $etape->setCampagne($this);
        }

        return $this;
    }

    public function removeEtape(Etape $etape): self
    {
        if ($this->etapes->removeElement($etape)) {
            // set the owning side to null (unless already changed)
            if ($etape->getCampagne() === $this) {
                $etape->setCampagne(null);
            }
        }

        return $this;
    }
}
