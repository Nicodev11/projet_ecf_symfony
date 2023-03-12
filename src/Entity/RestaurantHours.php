<?php

namespace App\Entity;

use App\Repository\RestaurantHoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantHoursRepository::class)]
class RestaurantHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $Day = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Opening_lunch = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Opening_dinner = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Closing_lunch = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Closing_dinner = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Closed = null;

    #[ORM\Column(nullable: true)]
    private ?bool $ClosedDinner = null;


    public function __construct()
    {
    }

    public function __toString()
    {
        return $this->Day;
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->Day;
    }

    public function setDay(string $Day): self
    {
        $this->Day = $Day;

        return $this;
    }

    public function getOpeningLunch(): ?\DateTimeInterface
    {
        return $this->Opening_lunch;
    }

    public function setOpeningLunch(\DateTimeInterface $Opening_lunch): self
    {
        $this->Opening_lunch = $Opening_lunch;

        return $this;
    }

    public function getClosingLunch(): ?\DateTimeInterface
    {
        return $this->Closing_lunch;
    }

    public function setClosingLunch(\DateTimeInterface $Closing_lunch): self
    {
        $this->Closing_lunch = $Closing_lunch;

        return $this;
    }

    public function getOpeningDinner(): ?\DateTimeInterface
    {
        return $this->Opening_dinner;
    }

    public function setOpeningDinner(\DateTimeInterface $Opening_dinner): self
    {
        $this->Opening_dinner = $Opening_dinner;

        return $this;
    }

    public function getClosingDinner(): ?\DateTimeInterface
    {
        return $this->Closing_dinner;
    }

    public function setClosingDinner(\DateTimeInterface $Closing_dinner): self
    {
        $this->Closing_dinner = $Closing_dinner;

        return $this;
    }

    public function isClosed(): ?bool
    {
        return $this->Closed;
    }

    public function setClosed(?bool $Closed): self
    {
        $this->Closed = $Closed;

        return $this;
    }

    public function isClosedDinner(): ?bool
    {
        return $this->ClosedDinner;
    }

    public function setClosedDinner(?bool $ClosedDinner): self
    {
        $this->ClosedDinner = $ClosedDinner;

        return $this;
    }
    

}
