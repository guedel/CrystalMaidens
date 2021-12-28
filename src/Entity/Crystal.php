<?php

namespace App\Entity;

use App\Repository\CrystalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CrystalRepository::class)
 */
class Crystal extends Ingredient
{
    /**
     * @ORM\ManyToOne(targetEntity=Element::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $nature;

    /**
     * @ORM\OneToMany(targetEntity=EtapeCrystal::class, mappedBy="crystal")
     */
    private $etapeCrystals;

    public function __construct()
    {
        parent::__construct();
        $this->etapeCrystals = new ArrayCollection();
    }

    public function getIngredientType()
    {
        return 'Crystal';
    }


    public function getNature(): ?Element
    {
        return $this->nature;
    }

    public function setNature(?Element $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * @return Collection|EtapeCrystal[]
     */
    public function getEtapeCrystals(): Collection
    {
        return $this->etapeCrystals;
    }

    public function addEtapeCrystal(EtapeCrystal $etapeCrystal): self
    {
        if (!$this->etapeCrystals->contains($etapeCrystal)) {
            $this->etapeCrystals[] = $etapeCrystal;
            $etapeCrystal->setCrystal($this);
        }

        return $this;
    }

    public function removeEtapeCrystal(EtapeCrystal $etapeCrystal): self
    {
        if ($this->etapeCrystals->removeElement($etapeCrystal)) {
            // set the owning side to null (unless already changed)
            if ($etapeCrystal->getCrystal() === $this) {
                $etapeCrystal->setCrystal(null);
            }
        }

        return $this;
    }
}
