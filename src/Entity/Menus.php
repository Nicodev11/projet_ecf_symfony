<?php

namespace App\Entity;

use App\Repository\MenusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenusRepository::class)]
class Menus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255,)]
    private ?string $entries = null;

    #[ORM\Column(length: 255)]
    private ?string $dishes = null;

    #[ORM\Column(length: 255)]
    private ?string $desserts = null;

    public function __construct()
    {
        
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

    public function getEntries(): ?string
    {
        return $this->entries;
    }

    public function setEntries(?string $entries): self
    {
        $this->entries = $entries;

        return $this;
    }

    public function getDishes(): ?string
    {
        return $this->dishes;
    }

    public function setDishes(string $dishes): self
    {
        $this->dishes = $dishes;

        return $this;
    }

    public function getDesserts(): ?string
    {
        return $this->desserts;
    }

    public function setDesserts(string $desserts): self
    {
        $this->desserts = $desserts;

        return $this;
    }
    
}
