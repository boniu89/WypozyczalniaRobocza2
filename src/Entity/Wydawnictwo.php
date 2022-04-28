<?php

namespace App\Entity;

use App\Repository\WydawnictwoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WydawnictwoRepository::class)]
class Wydawnictwo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nazwa;

    #[ORM\Column(type: 'boolean')]
    private $status;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwa(): ?string
    {
        return $this->nazwa;
    }

    public function setNazwa(string $nazwa): self
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function __toString()
    {
        return $this->nazwa;
    }
}