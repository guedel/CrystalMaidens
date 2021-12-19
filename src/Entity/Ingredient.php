<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="level", type="integer")
 * @ORM\DiscriminatorMap({1 = "BossIngredient", 4 = "Crystal", 5 = "Item", 6 = "Maiden"})
 */
class Ingredient
{
    const 
        BOSS_INGREDIENT = 1,
        CRYSTAL = 4,
        ITEM = 5,
        MAIDEN = 6
    ;

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
     * @ORM\OneToMany(targetEntity=IngredientConstituant::class, mappedBy="ingredient")
     */
    private $constituants;

    /**
     * @ORM\OneToMany(targetEntity=IngredientConstituant::class, mappedBy="constituant")
     */
    private $ingredients;

    public function __construct()
    {
        $this->constituants = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
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
     * @return Collection|IngredientConstituant[]
     */
    public function getConstituants(): Collection
    {
        return $this->constituants;
    }

    public function addConstituant(IngredientConstituant $constituant): self
    {
        if (!$this->constituants->contains($constituant)) {
            $this->constituants[] = $constituant;
            $constituant->setIngredient($this);
        }

        return $this;
    }

    public function removeConstituant(IngredientConstituant $constituant): self
    {
        if ($this->constituants->removeElement($constituant)) {
            // set the owning side to null (unless already changed)
            if ($constituant->getIngredient() === $this) {
                $constituant->setIngredient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|IngredientConstituant[]
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(IngredientConstituant $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
            $ingredient->setConstituant($this);
        }

        return $this;
    }

    public function removeIngredient(IngredientConstituant $ingredient): self
    {
        if ($this->ingredients->removeElement($ingredient)) {
            // set the owning side to null (unless already changed)
            if ($ingredient->getConstituant() === $this) {
                $ingredient->setConstituant(null);
            }
        }

        return $this;
    }
}
