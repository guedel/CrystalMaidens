<?php

namespace App\Entity;

use App\Repository\EtapeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtapeRepository::class)
 */
class Etape
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="boolean")
     */
    private $boss;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $energie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $experience;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $expMaiden;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $coins;

    /**
     * @ORM\ManyToOne(targetEntity=Campagne::class, inversedBy="etapes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $campagne;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minGachaOrbs;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxGachaOrbs;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getBoss(): ?bool
    {
        return $this->boss;
    }

    public function setBoss(bool $boss): self
    {
        $this->boss = $boss;

        return $this;
    }

    public function getEnergie(): ?int
    {
        return $this->energie;
    }

    public function setEnergie(?int $energie): self
    {
        $this->energie = $energie;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(?int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getExpMaiden(): ?int
    {
        return $this->expMaiden;
    }

    public function setExpMaiden(?int $expMaiden): self
    {
        $this->expMaiden = $expMaiden;

        return $this;
    }

    public function getCoins(): ?int
    {
        return $this->coins;
    }

    public function setCoins(?int $coins): self
    {
        $this->coins = $coins;

        return $this;
    }

    public function getCampagne(): ?Campagne
    {
        return $this->campagne;
    }

    public function setCampagne(?Campagne $campagne): self
    {
        $this->campagne = $campagne;

        return $this;
    }

    public function getMinGachaOrbs(): ?int
    {
        return $this->minGachaOrbs;
    }

    public function setMinGachaOrbs(?int $minGachaOrbs): self
    {
        $this->minGachaOrbs = $minGachaOrbs;

        return $this;
    }

    public function getMaxGachaOrbs(): ?int
    {
        return $this->maxGachaOrbs;
    }

    public function setMaxGachaOrbs(?int $maxGachaOrbs): self
    {
        $this->maxGachaOrbs = $maxGachaOrbs;

        return $this;
    }
}
