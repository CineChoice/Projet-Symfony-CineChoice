<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbBilletsR = null;

    #[ORM\OneToMany(mappedBy: 'reservation', targetEntity: Seance::class)]
    private Collection $Reservations;

    public function __construct()
    {
        $this->Reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbBilletsR(): ?int
    {
        return $this->nbBilletsR;
    }

    public function setNbBilletsR(int $nbBilletsR): static
    {
        $this->nbBilletsR = $nbBilletsR;

        return $this;
    }

    /**
     * @return Collection<int, Seance>
     */
    public function getReservations(): Collection
    {
        return $this->Reservations;
    }

    public function addReservation(Seance $reservation): static
    {
        if (!$this->Reservations->contains($reservation)) {
            $this->Reservations->add($reservation);
            $reservation->setReservation($this);
        }

        return $this;
    }

    public function removeReservation(Seance $reservation): static
    {
        if ($this->Reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getReservation() === $this) {
                $reservation->setReservation(null);
            }
        }

        return $this;
    }
}
