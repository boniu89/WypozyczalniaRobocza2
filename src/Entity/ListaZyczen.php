<?php

namespace App\Entity;

use App\Repository\ListaZyczenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListaZyczenRepository::class)]
class ListaZyczen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Uzytkownik::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_uzytkownik;

    #[ORM\ManyToOne(targetEntity: Gra::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_gra;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUzytkownik(): ?uzytkownik
    {
        return $this->id_uzytkownik;
    }

    public function setIdUzytkownik(?uzytkownik $id_uzytkownik): self
    {
        $this->id_uzytkownik = $id_uzytkownik;

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
}