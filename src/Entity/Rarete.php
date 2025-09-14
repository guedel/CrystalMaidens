<?php declare(strict_types=1);

namespace App\Entity;

use Stringable;
use App\Repository\RareteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table]
#[ORM\UniqueConstraint(columns: ['nom'])]
#[ORM\Entity(repositoryClass: RareteRepository::class)]
class Rarete implements Stringable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private ?string $nom = null;

    #[ORM\OneToMany(targetEntity: EtapeItem::class, mappedBy: 'rarity')]
    private Collection|array $etapeItems;

    public function __construct()
    {
        $this->etapeItems = new ArrayCollection();
    }

    public function __toString(): string
    {
        return (string) $this->nom;
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
            $etapeItem->setRarity($this);
        }

        return $this;
    }

    public function removeEtapeItem(EtapeItem $etapeItem): self
    {
        if ($this->etapeItems->removeElement($etapeItem)) {
            // set the owning side to null (unless already changed)
            if ($etapeItem->getRarity() === $this) {
                $etapeItem->setRarity(null);
            }
        }

        return $this;
    }
}
