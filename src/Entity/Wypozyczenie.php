<?php

namespace App\Entity;

use App\Repository\WypozyczenieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WypozyczenieRepository::class)]
class Wypozyczenie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Uzytkownik::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_uzytkownik;

    #[ORM\OneToOne(targetEntity: Egzemplarz::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $id_egzemplarz;

    #[ORM\Column(type: 'date')]
    private $data_wyp;

    #[ORM\Column(type: 'date')]
    private $data_zwrotu;

    #[ORM\Column(type: 'text', nullable: true)]
    private $uwagi_admin_przed;

    #[ORM\Column(type: 'text', nullable: true)]
    private $uwagi_admin_po;

    #[ORM\Column(type: 'string', length: 255)]
    private $status;

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

    public function getIdEgzemplarz(): ?egzemplarz
    {
        return $this->id_egzemplarz;
    }

    public function setIdEgzemplarz(egzemplarz $id_egzemplarz): self
    {
        $this->id_egzemplarz = $id_egzemplarz;

        return $this;
    }

    public function getDataWyp(): ?\DateTimeInterface
    {
        return $this->data_wyp;
    }

    public function setDataWyp(\DateTimeInterface $data_wyp): self
    {
        $this->data_wyp = $data_wyp;

        return $this;
    }

    public function getDataZwrotu(): ?\DateTimeInterface
    {
        return $this->data_zwrotu;
    }

    public function setDataZwrotu(\DateTimeInterface $data_zwrotu): self
    {
        $this->data_zwrotu = $data_zwrotu;

        return $this;
    }

    public function getUwagiAdminPrzed(): ?string
    {
        return $this->uwagi_admin_przed;
    }

    public function setUwagiAdminPrzed(?string $uwagi_admin_przed): self
    {
        $this->uwagi_admin_przed = $uwagi_admin_przed;

        return $this;
    }

    public function getUwagiAdminPo(): ?string
    {
        return $this->uwagi_admin_po;
    }

    public function setUwagiAdminPo(?string $uwagi_admin_po): self
    {
        $this->uwagi_admin_po = $uwagi_admin_po;

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