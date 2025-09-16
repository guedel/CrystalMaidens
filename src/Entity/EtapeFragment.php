<?php declare(strict_types=1);

namespace App\Entity;

use Stringable;
use App\Repository\EtapeFragmentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtapeFragmentRepository::class)]
class EtapeFragment implements Stringable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $minimum = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $maximum = null;

    #[ORM\ManyToOne(targetEntity: Maiden::class, inversedBy: 'etapeFragments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Maiden $maiden = null;

    #[ORM\ManyToOne(targetEntity: Etape::class, inversedBy: 'etapeFragments')]
    private ?Etape $etape = null;

    public function __toString(): string
    {
        return sprintf("%s (%d to %d)", $this->maiden->getNom(), $this->minimum, $this->maximum);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtape(): ?Etape
    {
        return $this->etape;
    }

    public function setEtape(?Etape $etape): self
    {
        $this->etape = $etape;

        return $this;
    }

    public function getMinimum(): ?int
    {
        return $this->minimum;
    }

    public function setMinimum(?int $minimum): self
    {
        $this->minimum = $minimum;

        return $this;
    }

    public function getMaximum(): ?int
    {
        return $this->maximum;
    }

    public function setMaximum(?int $maximum): self
    {
        $this->maximum = $maximum;

        return $this;
    }

    public function getMaiden(): ?Maiden
    {
        return $this->maiden;
    }

    public function setMaiden(?Maiden $maiden): self
    {
        $this->maiden = $maiden;

        return $this;
    }
}
