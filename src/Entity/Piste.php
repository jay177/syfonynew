<?php

namespace App\Entity;

use App\Repository\PisteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PisteRepository::class)]
class Piste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?bool $ouvert = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $horaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dificulté = null;

    #[ORM\ManyToOne(inversedBy: 'pistes')]
    private ?Station $station = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Alerte = null;

    #[ORM\Column]
    private ?bool $AlpNord = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function isOuvert(): ?bool
    {
        return $this->ouvert;
    }

    public function setOuvert(?bool $ouvert): self
    {
        $this->ouvert = $ouvert;

        return $this;
    }

    public function getHoraire(): ?string
    {
        return $this->horaire;
    }

    public function setHoraire(?string $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }

    public function getDificulté(): ?string
    {
        return $this->dificulté;
    }

    public function setDificulté(?string $dificulté): self
    {
        $this->dificulté = $dificulté;

        return $this;
    }

    public function getStation(): ?Station
    {
        return $this->station;
    }

    public function setStation(?Station $station): self
    {
        $this->station = $station;

        return $this;
    }

    public function getAlerte(): ?string
    {
        return $this->Alerte;
    }

    public function setAlerte(?string $Alerte): self
    {
        $this->Alerte = $Alerte;

        return $this;
    }

    public function isAlpNord(): ?bool
    {
        return $this->AlpNord;
    }

    public function setAlpNord(bool $AlpNord): self
    {
        $this->AlpNord = $AlpNord;

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
