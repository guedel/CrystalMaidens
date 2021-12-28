<?php

namespace App\Entity;

use App\Repository\RareteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RareteRepository::class)
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(columns={"nom"})})
 */
class Rarete
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
     * @ORM\OneToMany(targetEntity=EtapeItem::class, mappedBy="rarity")
     */
    private $etapeItems;

    public function __construct()
    {
        $this->etapeItems = new ArrayCollection();
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
     * @return Collection|EtapeItem[]
     */
    public function getEtapeItems(): Collection
    {
        return $this->etapeItems;
    }

    public function addEtapeItem(EtapeItem $etapeItem): self
    {
        if (!$this->etapeItems->contains($etapeItem)) {
            $this->etapeItems[] = $etapeItem;
            $etapeItem->setRarity($this);
        }

        return $this;
    }

    public function removeEtapeItem(EtapeItem $etapeItem): self
    {
        if ($this->etapeItems->removeElement($etapeItem)) {
            // set the owning side to null (unless already changed)
            if ($etapeItem->getRarity() === $this) {
                $etapeItem->setRarity(null);
            }
        }

        return $this;
    }
}
