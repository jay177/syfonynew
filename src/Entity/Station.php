<?php

namespace App\Entity;

use App\Repository\StationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StationRepository::class)]
class Station
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?bool $state = null;

    #[ORM\Column(nullable: true)]
    private ?int $note = null;

    #[ORM\ManyToOne(inversedBy: 'station')]
    private ?GrandDomaine $station = null;

    #[ORM\OneToMany(mappedBy: 'station', targetEntity: Piste::class)]
    private Collection $pistes;

    #[ORM\OneToMany(mappedBy: 'station', targetEntity: Remontees::class)]
    private Collection $remontees;

    public function __construct()
    {
        $this->pistes = new ArrayCollection();
        $this->remontees = new ArrayCollection();
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

    public function isState(): ?bool
    {
        return $this->state;
    }

    public function setState(?bool $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getStation(): ?GrandDomaine
    {
        return $this->station;
    }

    public function setStation(?GrandDomaine $station): self
    {
        $this->station = $station;

        return $this;
    }


    /**
     * @return Collection<int, Piste>
     */
    public function getPistes(): Collection
    {
        return $this->pistes;
    }

    public function addPiste(Piste $piste): self
    {
        if (!$this->pistes->contains($piste)) {
            $this->pistes->add($piste);
            $piste->setStation($this);
        }

        return $this;
    }

    public function removePiste(Piste $piste): self
    {
        if ($this->pistes->removeElement($piste)) {
            // set the owning side to null (unless already changed)
            if ($piste->getStation() === $this) {
                $piste->setStation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Remontees>
     */
    public function getRemontees(): Collection
    {
        return $this->remontees;
    }

    public function addRemontee(Remontees $remontee): self
    {
        if (!$this->remontees->contains($remontee)) {
            $this->remontees->add($remontee);
            $remontee->setStation($this);
        }

        return $this;
    }

    public function removeRemontee(Remontees $remontee): self
    {
        if ($this->remontees->removeElement($remontee)) {
            // set the owning side to null (unless already changed)
            if ($remontee->getStation() === $this) {
                $remontee->setStation(null);
            }
        }

        return $this;
    }




}
