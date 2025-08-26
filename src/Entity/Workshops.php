<?php

namespace App\Entity;

use App\Repository\WorkshopsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkshopsRepository::class)]
class Workshops
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $maxSlots = null;

    #[ORM\Column]
    private ?int $roomNumber = null;

    #[ORM\OneToOne(mappedBy: 'workshop', cascade: ['persist', 'remove'])]
    private ?TimeSlots $timeSlots = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMaxSlots(): ?int
    {
        return $this->maxSlots;
    }

    public function setMaxSlots(int $maxSlots): static
    {
        $this->maxSlots = $maxSlots;

        return $this;
    }

    public function getRoomNumber(): ?int
    {
        return $this->roomNumber;
    }

    public function setRoomNumber(int $roomNumber): static
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

    public function getTimeSlots(): ?TimeSlots
    {
        return $this->timeSlots;
    }

    public function setTimeSlots(TimeSlots $timeSlots): static
    {
        // set the owning side of the relation if necessary
        if ($timeSlots->getWorkshop() !== $this) {
            $timeSlots->setWorkshop($this);
        }

        $this->timeSlots = $timeSlots;

        return $this;
    }
}
