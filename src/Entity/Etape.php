<?php

namespace App\Entity;

use Stringable;
use App\Repository\EtapeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtapeRepository::class)]
class Etape implements Stringable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer')]
    private ?int $numero = null;

    #[ORM\Column(type: 'boolean')]
    private ?bool $boss = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $energie = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $experience = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $expMaiden = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $coins = null;

    #[ORM\ManyToOne(targetEntity: Campagne::class, inversedBy: 'etapes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Campagne $campagne = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $minGachaOrbs = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $maxGachaOrbs = null;

    #[ORM\OneToMany(targetEntity: EtapeFragment::class, mappedBy: 'etape')]
    private Collection|array $etapeFragments;

    #[ORM\OneToMany(targetEntity: EtapeCrystal::class, mappedBy: 'etape')]
    private Collection|array $etapeCrystals;

    #[ORM\OneToMany(targetEntity: EtapeAdversaire::class, mappedBy: 'etape')]
    private Collection|array $etapeAdversaires;

    #[ORM\OneToMany(targetEntity: EtapeItem::class, mappedBy: 'etape')]
    private Collection|array $etapeItems;

    public function __construct()
    {
        $this->etapeFragments = new ArrayCollection();
        $this->etapeCrystals = new ArrayCollection();
        $this->etapeAdversaires = new ArrayCollection();
        $this->etapeItems = new ArrayCollection();
    }

    public function __toString(): string
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

    /**
     * @return Collection|EtapeAdversaire[]
     */
    public function getEtapeAdversaires(): Collection
    {
        return $this->etapeAdversaires;
    }

    public function addEtapeAdversaire(EtapeAdversaire $etapeAdversaire): self
    {
        if (!$this->etapeAdversaires->contains($etapeAdversaire)) {
            $this->etapeAdversaires[] = $etapeAdversaire;
            $etapeAdversaire->setEtape($this);
        }

        return $this;
    }

    public function removeEtapeAdversaire(EtapeAdversaire $etapeAdversaire): self
    {
        if ($this->etapeAdversaires->removeElement($etapeAdversaire)) {
            // set the owning side to null (unless already changed)
            if ($etapeAdversaire->getEtape() === $this) {
                $etapeAdversaire->setEtape(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EtapeItem[]
     */
    public function getEtapeItems(): Collection
    {
        return $this->etapeItems;
    }

    public function addEtapeItem(EtapeItem $etapeItem): self
    {
        if (!$this->etapeItems->contains($etapeItem)) {
            $this->etapeItems[] = $etapeItem;
            $etapeItem->setEtape($this);
        }

        return $this;
    }

    public function removeEtapeItem(EtapeItem $etapeItem): self
    {
        if ($this->etapeItems->removeElement($etapeItem)) {
            // set the owning side to null (unless already changed)
            if ($etapeItem->getEtape() === $this) {
                $etapeItem->setEtape(null);
            }
        }

        return $this;
    }
}
