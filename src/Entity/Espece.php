<?php

namespace App\Entity;

use App\Repository\EspeceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EspeceRepository::class)]
class Espece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $libEspece = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibEspece(): ?string
    {
        return $this->libEspece;
    }

    public function setLibEspece(string $libEspece): static
    {
        $this->libEspece = $libEspece;

        return $this;
    }
}
