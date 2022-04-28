<?php

namespace App\Entity;

use App\Repository\EgzemplarzRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: EgzemplarzRepository::class)]
#[UniqueEntity(fields: ['identyfikator'], message: 'Wprowadzony identyfikator już istnieje')]
class Egzemplarz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $identyfikator;

    #[ORM\Column(type: 'boolean')]
    private $status;

    #[ORM\ManyToOne(targetEntity: Gra::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_gra;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentyfikator(): ?int
    {
        return $this->identyfikator;
    }

    public function setIdentyfikator(int $identyfikator): self
    {
        $this->identyfikator = $identyfikator;

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

    public function getIdGra(): ?gra
    {
        return $this->id_gra;
    }

    public function setIdGra(?gra $id_gra): self
    {
        $this->id_gra = $id_gra;

        return $this;
    }

    public function __toString()
    {
        return $this->identyfikator.' - '.$this->getIdGra();
    }
}