<?php

namespace App\Entity;

use App\Repository\IngredientConstituantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientConstituantRepository::class)
 */
class IngredientConstituant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Ingredient::class, inversedBy="constituants")
     */
    private $ingredient;

    /**
     * @ORM\ManyToOne(targetEntity=Ingredient::class, inversedBy="ingredients")
     */
    private $constituant;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantity;

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
