<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item extends Ingredient
{
    /**
     * @ORM\ManyToOne(targetEntity=Classe::class)
     */
    private $classe;

    /**
     * @ORM\ManyToOne(targetEntity=Emplacement::class, inversedBy="items")
     */
    private $emplacement;

    /**
     * @ORM\ManyToOne(targetEntity=Maiden::class)
     */
    private $maiden;

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
}
