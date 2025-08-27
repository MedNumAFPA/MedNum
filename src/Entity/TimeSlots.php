<?php

namespace App\Entity;

use App\Repository\TimeSlotsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimeSlotsRepository::class)]
class TimeSlots
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $fromTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $toTime = null;

    #[ORM\ManyToOne(inversedBy: 'timeSlots')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Workshops $workshop = null;

    /**
     * @var Collection<int, Reservations>
     */
    #[ORM\OneToMany(targetEntity: Reservations::class, mappedBy: 'timeslot', orphanRemoval: true)]
    private Collection $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function getFromTime(): ?\DateTime
    {
        return $this->fromTime;
    }

    public function setFromTime(\DateTime $fromTime): static
    {
        $this->fromTime = $fromTime;
        return $this;
    }

    public function getToTime(): ?\DateTime
    {
        return $this->toTime;
    }

    public function setToTime(\DateTime $toTime): static
    {
        $this->toTime = $toTime;
        return $this;
    }

    public function getWorkshop(): ?Workshops
    {
        return $this->workshop;
    }

    public function setWorkshop(?Workshops $workshop): static
    {
        $this->workshop = $workshop;
        return $this;
    }

    /**
     * @return Collection<int, Reservations>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservations $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setTimeslot($this);
        }
        return $this;
    }

    public function removeReservation(Reservations $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            if ($reservation->getTimeslot() === $this) {
                $reservation->setTimeslot(null);
            }
        }
        return $this;
    }

    public function isTaken(): ?bool
    {
        return $this->isTaken;
    }

    public function setIsTaken(bool $isTaken): static
    {
        $this->isTaken = $isTaken;
        return $this;
    }
}
