<?php

namespace App\Entity;

use App\Repository\RezerwacjaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RezerwacjaRepository::class)]
class Rezerwacja
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Uzytkownik::class, inversedBy: 'Rezerwacje')]
    #[ORM\JoinColumn(nullable: false)]
    private $Id_User;

    #[ORM\ManyToOne(inversedBy: 'Rezerwacja', targetEntity: Egzemplarz::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $Id_Egzemplarz;

    #[ORM\Column(type: 'date', nullable:false)]
    private $Data_rezerwacji_start;

    #[ORM\Column(type: 'date', nullable:false)]
    private $Data_rezerwacji_stop;

    #[ORM\Column(type: 'string', length: 255, nullable:false)]
    private $Status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?Uzytkownik
    {
        return $this->Id_User;
    }

    public function setIdUser(?Uzytkownik $Id_User): self
    {
        $this->Id_User = $Id_User;

        return $this;
    }

    public function getIdEgzemplarz(): ?Egzemplarz
    {
        return $this->Id_Egzemplarz;
    }

    public function setIdEgzemplarz(Egzemplarz $Id_Egzemplarz): self
    {
        $this->Id_Egzemplarz = $Id_Egzemplarz;

        return $this;
    }

    public function getDataRezerwacjiStart(): ?\DateTimeInterface
    {
        return $this->Data_rezerwacji_start;
    }

    public function setDataRezerwacjiStart(\DateTimeInterface $Data_rezerwacji_start): self
    {
        $this->Data_rezerwacji_start = $Data_rezerwacji_start;

        return $this;
    }

    public function getDataRezerwacjiStop(): ?\DateTimeInterface
    {
        return $this->Data_rezerwacji_stop;
    }

    public function setDataRezerwacjiStop(\DateTimeInterface $Data_rezerwacji_stop): self
    {
        $this->Data_rezerwacji_stop = $Data_rezerwacji_stop;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }
}