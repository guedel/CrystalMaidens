<?php

namespace App\Entity;

use App\Repository\ElementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ElementRepository::class)
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(columns={"nom"})})
 */
class Element
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=EtapeAdversaire::class, mappedBy="element")
     */
    private $etapeAdversaires;

    public function __construct()
    {
        $this->etapeAdversaires = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|EtapeAdversaire[]
     */
    public function getEtapeAdversaires(): Collection
    {
        return $this->etapeAdversaires;
    }

    public function addEtapeAdversaire(EtapeAdversaire $etapeAdversaire): self
    {
        if (!$this->etapeAdversaires->contains($etapeAdversaire)) {
            $this->etapeAdversaires[] = $etapeAdversaire;
            $etapeAdversaire->setElement($this);
        }

        return $this;
    }

    public function removeEtapeAdversaire(EtapeAdversaire $etapeAdversaire): self
    {
        if ($this->etapeAdversaires->removeElement($etapeAdversaire)) {
            // set the owning side to null (unless already changed)
            if ($etapeAdversaire->getElement() === $this) {
                $etapeAdversaire->setElement(null);
            }
        }

        return $this;
    }
}
