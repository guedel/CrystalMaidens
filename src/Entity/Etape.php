<?php

namespace App\Entity;

use App\Repository\EtapeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=EtapeFragment::class, mappedBy="etape")
     */
    private $etapeFragments;

    /**
     * @ORM\OneToMany(targetEntity=EtapeCrystal::class, mappedBy="etape")
     */
    private $etapeCrystals;

    public function __construct()
    {
        $this->etapeFragments = new ArrayCollection();
        $this->etapeCrystals = new ArrayCollection();
    }

    public function __toString()
    {
        return 'C ' . $this->campagne->getId() . ' E ' . $this->numero;
    }

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

    /**
     * @return Collection|EtapeFragment[]
     */
    public function getEtapeFragments(): Collection
    {
        return $this->etapeFragments;
    }

    public function addEtapeFragment(EtapeFragment $etapeFragment): self
    {
        if (!$this->etapeFragments->contains($etapeFragment)) {
            $this->etapeFragments[] = $etapeFragment;
            $etapeFragment->setEtape($this);
        }

        return $this;
    }

    public function removeEtapeFragment(EtapeFragment $etapeFragment): self
    {
        if ($this->etapeFragments->removeElement($etapeFragment)) {
            // set the owning side to null (unless already changed)
            if ($etapeFragment->getEtape() === $this) {
                $etapeFragment->setEtape(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EtapeCrystal[]
     */
    public function getEtapeCrystals(): Collection
    {
        return $this->etapeCrystals;
    }

    public function addEtapeCrystal(EtapeCrystal $etapeCrystal): self
    {
        if (!$this->etapeCrystals->contains($etapeCrystal)) {
            $this->etapeCrystals[] = $etapeCrystal;
            $etapeCrystal->setEtape($this);
        }

        return $this;
    }

    public function removeEtapeCrystal(EtapeCrystal $etapeCrystal): self
    {
        if ($this->etapeCrystals->removeElement($etapeCrystal)) {
            // set the owning side to null (unless already changed)
            if ($etapeCrystal->getEtape() === $this) {
                $etapeCrystal->setEtape(null);
            }
        }

        return $this;
    }
}
