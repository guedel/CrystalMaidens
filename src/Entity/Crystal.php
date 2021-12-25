<?php

namespace App\Entity;

use App\Repository\CrystalRepository;
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
}
