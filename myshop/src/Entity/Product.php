<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name:"title", length: 50)]
    private ?string $title = null;

    #[ORM\Column(name:"description", length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name:"price", )]
    private ?float $price = null;

    #[ORM\Column(name:"city", length: 50)]
    private ?string $city = null;

    #[ORM\Column(name:"postal_code", )]
    private ?int $postalCode = null;

    #[ORM\Column(name:"reservation_text", length: 255, nullable: true)]
    private ?string $reservationText = null;

    #[ORM\Column(name:"image", length: 255, nullable: true)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }
// php function strtoupper() allows to set a string to uppercase while being set in the database
    public function setTitle(string $title): static
    {
        $this->title = strtoupper($title);

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getReservationText(): ?string
    {
        return $this->reservationText;
    }

    public function setReservationText(?string $reservationText): static
    {
        $this->reservationText = $reservationText;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
