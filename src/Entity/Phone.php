<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PhoneRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PhoneRepository::class)]
#[ApiResource(
    formats: ['json'],
    collectionOperations: ['get' => ['normalization_context' => ['groups' => 'read:collection_phone']]],
    itemOperations: ['get' => ['normalization_context' => ['groups' => 'read:item_phone']]],
    order: ["price" => "DESC"],

)]
class Phone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:collection_phone'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection_phone','read:item_phone'])]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:item_phone'])]
    private $description;

    #[ORM\Column(type: 'float')]
    #[Groups(['read:item_phone'])]
    private $price;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['read:item_phone'])]
    private $image;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:item_phone'])]
    private $brand;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }
}
