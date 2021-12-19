<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="level", type="integer")
 * @ORM\DiscriminatorMap({6 = "Maiden"})
 */
class Ingredient
{
    const 
        OTHER = 0,
        BASIC = 1,
        REFINED = 2,
        MASTER = 3,
        CRYSTALS = 4,
        ITEM = 5,
        MAIDEN = 6,
        SHARD = 7;

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
}
