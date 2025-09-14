<?php declare(strict_types=1);

namespace App\Entity;

use Stringable;
use App\Repository\ElementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table]
#[ORM\UniqueConstraint(columns: ['nom'])]
#[ORM\Entity(repositoryClass: ElementRepository::class)]
class Element implements Stringable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private ?string $nom = null;

    #[ORM\OneToMany(targetEntity: EtapeAdversaire::class, mappedBy: 'element')]
    private Collection|array $etapeAdversaires;

    public function __construct()
    {
        $this->etapeAdversaires = new ArrayCollection();
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
            $etapeAdversaire->setElement($this);
        }

        return $this;
    }

    public function removeEtapeAdversaire(EtapeAdversaire $etapeAdversaire): self
    {
        if ($this->etapeAdversaires->removeElement($etapeAdversaire)) {
            // set the owning side to null (unless already changed)
            if ($etapeAdversaire->getElement() === $this) {
                $etapeAdversaire->setElement(null);
            }
        }

        return $this;
    }
}
