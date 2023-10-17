<?php

namespace App\Entity;

use App\Repository\SeanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeanceRepository::class)]
class Seance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateSeance = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureDebSeance = null;

    #[ORM\OneToMany(mappedBy: 'seance', targetEntity: Film::class)]
    private Collection $Seances;

    #[ORM\OneToMany(mappedBy: 'seance', targetEntity: Salle::class)]
    private Collection $Salles;

    #[ORM\ManyToOne(inversedBy: 'Reservations')]
    private ?Reservation $reservation = null;

    public function __construct()
    {
        $this->Seances = new ArrayCollection();
        $this->Salles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getDateSeance(): ?\DateTimeInterface
    {
        return $this->dateSeance;
    }

    public function setDateSeance(\DateTimeInterface $dateSeance): static
    {
        $this->dateSeance = $dateSeance;

        return $this;
    }

    public function getHeureDebSeance(): ?\DateTimeInterface
    {
        return $this->heureDebSeance;
    }

    public function setHeureDebSeance(\DateTimeInterface $heureDebSeance): static
    {
        $this->heureDebSeance = $heureDebSeance;

        return $this;
    }

    /**
     * @return Collection<int, Film>
     */
    public function getSeances(): Collection
    {
        return $this->Seances;
    }

    public function addSeance(Film $seance): static
    {
        if (!$this->Seances->contains($seance)) {
            $this->Seances->add($seance);
            $seance->setSeance($this);
        }

        return $this;
    }

    public function removeSeance(Film $seance): static
    {
        if ($this->Seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getSeance() === $this) {
                $seance->setSeance(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Salle>
     */
    public function getSalles(): Collection
    {
        return $this->Salles;
    }

    public function addSalle(Salle $salle): static
    {
        if (!$this->Salles->contains($salle)) {
            $this->Salles->add($salle);
            $salle->setSeance($this);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): static
    {
        if ($this->Salles->removeElement($salle)) {
            // set the owning side to null (unless already changed)
            if ($salle->getSeance() === $this) {
                $salle->setSeance(null);
            }
        }

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): static
    {
        $this->reservation = $reservation;

        return $this;
    }
}
