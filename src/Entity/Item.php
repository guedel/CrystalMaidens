<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item extends Ingredient
{
    #[ORM\ManyToOne(targetEntity: Classe::class)]
    private ?Classe $classe = null;

    #[ORM\ManyToOne(targetEntity: Emplacement::class, inversedBy: 'items')]
    private ?Emplacement $emplacement = null;

    #[ORM\ManyToOne(targetEntity: Maiden::class)]
    private ?Maiden $maiden = null;

    #[ORM\OneToMany(targetEntity: EtapeItem::class, mappedBy: 'item')]
    private Collection|array $etapeItems;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $description = null;

    public function __construct()
    {
        parent::__construct();
        $this->etapeItems = new ArrayCollection();
    }

    public function getIngredientType()
    {
        return $this->emplacement->getNom() . '\'s item for ' . $this->classe->getNom() ;
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

    public function getEmplacement(): ?Emplacement
    {
        return $this->emplacement;
    }

    public function setEmplacement(?Emplacement $emplacement): self
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    public function getMaiden(): ?Maiden
    {
        return $this->maiden;
    }

    public function setMaiden(?Maiden $maiden): self
    {
        $this->maiden = $maiden;

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
            $etapeItem->setItem($this);
        }

        return $this;
    }

    public function removeEtapeItem(EtapeItem $etapeItem): self
    {
        if ($this->etapeItems->removeElement($etapeItem)) {
            // set the owning side to null (unless already changed)
            if ($etapeItem->getItem() === $this) {
                $etapeItem->setItem(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
