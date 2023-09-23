<?php

namespace App\Entity;

use Stringable;
use App\Repository\IngredientConstituantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientConstituantRepository::class)]
class IngredientConstituant implements Stringable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Ingredient::class, inversedBy: 'constituants')]
    private ?Ingredient $ingredient = null;

    #[ORM\ManyToOne(targetEntity: Ingredient::class, inversedBy: 'ingredients', cascade: ['persist'])]
    private ?Ingredient $constituant = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $quantity = null;

    public function __toString(): string
    {
        return $this->constituant->getNom() . ' component';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getConstituant(): ?Ingredient
    {
        return $this->constituant;
    }

    public function setConstituant(?Ingredient $constituant): self
    {
        $this->constituant = $constituant;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
