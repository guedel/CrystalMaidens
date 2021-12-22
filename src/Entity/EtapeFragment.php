<?php

namespace App\Entity;

use App\Repository\EtapeFragmentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtapeFragmentRepository::class)
 */
class EtapeFragment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minimum;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maximum;

    /**
     * @ORM\ManyToOne(targetEntity=Maiden::class, inversedBy="etapeFragments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $maiden;

    /**
     * @ORM\ManyToOne(targetEntity=Etape::class, inversedBy="etapeFragments")
     */
    private $etape;

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
