<?php

namespace App\Entity;

use App\Repository\GrandDomaineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GrandDomaineRepository::class)]
class GrandDomaine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'station', targetEntity: Station::class)]
    private Collection $station;

    public function __construct()
    {
        $this->station = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Station>
     */
    public function getStation(): Collection
    {
        return $this->station;
    }

    public function addStation(Station $station): self
    {
        if (!$this->station->contains($station)) {
            $this->station->add($station);
            $station->setStation($this);
        }

        return $this;
    }

    public function removeStation(Station $station): self
    {
        if ($this->station->removeElement($station)) {
            // set the owning side to null (unless already changed)
            if ($station->getStation() === $this) {
                $station->setStation(null);
            }
        }

        return $this;
    }
}
