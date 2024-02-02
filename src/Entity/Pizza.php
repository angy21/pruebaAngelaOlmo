<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PizzaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PizzaRepository::class)]
#[ApiResource]
class Pizza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 48)]
    #[Assert\NotNull]
    #[Assert\Type('string')]
    private ?string $name = null;

    #[ORM\Column(type: Types::ARRAY)]
    #[Assert\NotNull]
    #[Assert\Type('array')]
    #[Assert\Count(
        min: 1,
        max: 20,
        minMessage: 'You must specify at least one ingredient',
        maxMessage: 'You cannot specify more than 20 ingredients',
    )]
    private array $ingredients = [];

    #[ORM\Column(nullable: true)]
    #[Assert\Type('integer')]
    private ?int $ovenTimeInSeconds = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull]
    #[Assert\Type('date')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Assert\Type('date')]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column]
    #[Assert\Type('boolean')]
    private ?bool $special = null;

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

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function setIngredients(array $ingredients): static
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getOvenTimeInSeconds(): ?int
    {
        return $this->ovenTimeInSeconds;
    }

    public function setOvenTimeInSeconds(?int $ovenTimeInSeconds): static
    {
        $this->ovenTimeInSeconds = $ovenTimeInSeconds;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function isSpecial(): ?bool
    {
        return $this->special;
    }

    public function setSpecial(bool $special): static
    {
        $this->special = $special;

        return $this;
    }
}
