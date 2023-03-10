<?php

namespace App\Entity;

use App\Repository\MenusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenusRepository::class)]
class Menus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $entries1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $entries2 = null;

    #[ORM\Column(length: 255)]
    private ?string $dishe1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dishe2 = null;

    #[ORM\Column(length: 255)]
    private ?string $dessert1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dessert2 = null;


    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
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

    public function getEntries1(): ?string
    {
        return $this->entries1;
    }

    public function setEntries1(string $entries1): self
    {
        $this->entries1 = $entries1;

        return $this;
    }

    public function getEntries2(): ?string
    {
        return $this->entries2;
    }

    public function setEntries2(?string $entries2): self
    {
        $this->entries2 = $entries2;

        return $this;
    }

    public function getDishe1(): ?string
    {
        return $this->dishe1;
    }

    public function setDishe1(string $dishe1): self
    {
        $this->dishe1 = $dishe1;

        return $this;
    }

    public function getDishe2(): ?string
    {
        return $this->dishe2;
    }

    public function setDishe2(?string $dishe2): self
    {
        $this->dishe2 = $dishe2;

        return $this;
    }

    public function getDessert1(): ?string
    {
        return $this->dessert1;
    }

    public function setDessert1(string $dessert1): self
    {
        $this->dessert1 = $dessert1;

        return $this;
    }

    public function getDessert2(): ?string
    {
        return $this->dessert2;
    }

    public function setDessert2(?string $dessert2): self
    {
        $this->dessert2 = $dessert2;

        return $this;
    }


}
