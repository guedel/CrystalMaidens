<?php

namespace App\Entity;

use App\Repository\TauxRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TauxRepository::class)
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(columns={"taux"})})
 */
class Taux
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $taux;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaux(): ?string
    {
        return $this->taux;
    }

    public function setTaux(string $taux): self
    {
        $this->taux = $taux;

        return $this;
    }
}
