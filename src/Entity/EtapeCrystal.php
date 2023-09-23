<?php

namespace App\Entity;

use Stringable;
use App\Repository\EtapeCrystalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtapeCrystalRepository::class)]
class EtapeCrystal implements Stringable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $minimum = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $maximum = null;

    #[ORM\ManyToOne(targetEntity: Crystal::class, inversedBy: 'etapeCrystals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Crystal $crystal = null;

    #[ORM\ManyToOne(targetEntity: Etape::class, inversedBy: 'etapeCrystals')]
    private ?Etape $etape = null;

    public function __toString(): string
    {
        return sprintf('%s (%d to %d)', $this->crystal->getNom(), $this->minimum, $this->maximum);
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCrystal(): ?Crystal
    {
        return $this->crystal;
    }

    public function setCrystal(?Crystal $crystal): self
    {
        $this->crystal = $crystal;

        return $this;
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
}
