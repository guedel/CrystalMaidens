<?php

namespace App\Entity;

use App\Repository\BossIngredientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BossIngredientRepository::class)]
class BossIngredient extends Ingredient
{
    #[ORM\ManyToOne(targetEntity: IngredientLevel::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?IngredientLevel $level = null;

    public function getIngredientType()
    {
        return 'Ingredient ' . $this->level->getNom();
    }


    public function getLevel(): ?IngredientLevel
    {
        return $this->level;
    }

    public function setLevel(?IngredientLevel $level): self
    {
        $this->level = $level;

        return $this;
    }
}
