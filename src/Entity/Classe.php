<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table]
#[ORM\UniqueConstraint(columns: ['nom'])]
#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nom;

    #[ORM\OneToMany(targetEntity: EtapeAdversaire::class, mappedBy: 'classe')]
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
            $etapeAdversaire->setClasse($this);
        }

        return $this;
    }

    public function removeEtapeAdversaire(EtapeAdversaire $etapeAdversaire): self
    {
        if ($this->etapeAdversaires->removeElement($etapeAdversaire)) {
            // set the owning side to null (unless already changed)
            if ($etapeAdversaire->getClasse() === $this) {
                $etapeAdversaire->setClasse(null);
            }
        }

        return $this;
    }
}
