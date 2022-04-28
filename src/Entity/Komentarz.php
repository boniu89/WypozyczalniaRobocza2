<?php

namespace App\Entity;

use App\Repository\KomentarzRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KomentarzRepository::class)]
class Komentarz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity:Gra::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_gra;

    #[ORM\ManyToOne(targetEntity: Uzytkownik::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_uzytkownik;

    #[ORM\Column(type: 'text')]
    private $tresc;

    #[ORM\Column(type: 'boolean')]
    private $czy_prywatny;

    #[ORM\Column(type: 'string', length: 255)]
    private $status;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdUzytkownik(): ?uzytkownik
    {
        return $this->id_uzytkownik;
    }

    public function setIdUzytkownik(?uzytkownik $id_uzytkownik): self
    {
        $this->id_uzytkownik = $id_uzytkownik;

        return $this;
    }

    public function getTresc(): ?string
    {
        return $this->tresc;
    }

    public function setTresc(string $tresc): self
    {
        $this->tresc = $tresc;

        return $this;
    }

    public function getCzyPrywatny(): ?bool
    {
        return $this->czy_prywatny;
    }

    public function setCzyPrywatny(bool $czy_prywatny): self
    {
        $this->czy_prywatny = $czy_prywatny;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}