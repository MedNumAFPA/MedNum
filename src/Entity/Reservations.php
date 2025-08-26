<?php

namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationsRepository::class)]
class Reservations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $formationName = null;

    #[ORM\Column]
    private ?bool $isReminderActive = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TimeSlots $timeslot = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getFormationName(): ?string
    {
        return $this->formationName;
    }

    public function setFormationName(string $formationName): static
    {
        $this->formationName = $formationName;

        return $this;
    }

    public function isReminderActive(): ?bool
    {
        return $this->isReminderActive;
    }

    public function setIsReminderActive(bool $isReminderActive): static
    {
        $this->isReminderActive = $isReminderActive;

        return $this;
    }

    public function getTimeslot(): ?TimeSlots
    {
        return $this->timeslot;
    }

    public function setTimeslot(?TimeSlots $timeslot): static
    {
        $this->timeslot = $timeslot;

        return $this;
    }
}
