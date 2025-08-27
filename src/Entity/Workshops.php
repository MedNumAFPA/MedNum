<?php

namespace App\Entity;

use App\Repository\WorkshopsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, TimeSlots>
     */
    // #[ORM\OneToMany(mappedBy: 'workshop', targetEntity: TimeSlots::class, cascade: ['persist', 'remove'])]
    #[ORM\OneToMany(mappedBy: 'workshop', targetEntity: TimeSlots::class, cascade: ['persist'])]
    private Collection $timeSlots;

    public function __construct()
    {
        $this->timeSlots = new ArrayCollection();
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

    /**
     * @return Collection<int, TimeSlots>
     */
    public function getTimeSlots(): Collection
    {
        return $this->timeSlots;
    }

    public function addTimeSlot(TimeSlots $timeSlot): static
    {
        if (!$this->timeSlots->contains($timeSlot)) {
            $this->timeSlots->add($timeSlot);
            $timeSlot->setWorkshop($this);
        }
        return $this;
    }

    public function removeTimeSlot(TimeSlots $timeSlot): static
    {
        if ($this->timeSlots->removeElement($timeSlot)) {
            if ($timeSlot->getWorkshop() === $this) {
                $timeSlot->setWorkshop(null);
            }
        }
        return $this;
    }
}
