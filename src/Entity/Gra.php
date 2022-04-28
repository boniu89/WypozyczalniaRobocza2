<?php

namespace App\Entity;

use App\Repository\GraRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: GraRepository::class)]
/**
 * @Vich\Uploadable()
 **/
class Gra
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nazwa;

    #[ORM\ManyToOne(targetEntity: Kategoria::class, inversedBy: 'Gry')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_Kategoria;

    #[ORM\ManyToOne(targetEntity: Wydawnictwo::class, inversedBy: 'Gry')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_Wydawnictwo;

    #[ORM\Column(type: 'integer')]
    private $Liczba_graczy_min;

    #[ORM\Column(type: 'integer')]
    private $Liczba_graczy_max;

    #[ORM\Column(type: 'integer')]
    private $Wiek_od_lat;

    #[ORM\Column(type: 'time')]
    private $Sredni_czas_gry;

    #[ORM\Column(type: 'text')]
    private $Opis;

    #[ORM\Column(type: 'boolean')]
    private $Status;

    #[ORM\Column(type: 'integer')]
    private $Cena;

    #[ORM\Column(type: 'integer')]
    private $Kaucja;
  
    #[ORM\OneToMany(mappedBy: 'id_Gra', targetEntity: Zdjecie::class, orphanRemoval: true, cascade:["persist"])]
    private $Zdjecia;

    #[ORM\OneToMany(mappedBy: 'id_gra', targetEntity: Egzemplarz::class, orphanRemoval: true)]
    private $Egzemplarze;

    #[ORM\OneToMany(mappedBy: 'id_gra', targetEntity: Komentarz::class, orphanRemoval: true)]
    private $Komentarze;

    #[ORM\Column(type: 'string', length: 255)]
    private $miniaturka;
  
    #[Vich\UploadableField(mapping: "gra_miniaturka", fileNameProperty: "miniaturka")]
    private ?File $miniaturkaPlik = null;

    #[ORM\Column(type: 'datetime', nullable:false)]
    private $data_aktualizacji;

    public function getMiniaturkaPlik(): ?File
    {
       // dd(miniaturkaPlik);
        return $this->miniaturkaPlik;
    }

    public function setMiniaturkaPlik(?File $miniaturkaPlik = null): self
    {
        dd($miniaturkaPlik);
        $this->miniaturkaPlik = $miniaturkaPlik;

        if(null !== $miniaturkaPlik)
        {
            $this->data_aktualizacji = new \DateTimeImmutable();
        }

    }

    public function getMiniaturka(): ?string
    {
        return $this->miniaturka;
    }

    public function setMiniaturka(?string $miniaturka): self
    {
         //dd($miniaturka);
        $this->miniaturka = $miniaturka;

        return $this;
    }

    public function getDataAktualizacji(): ?\DateTimeInterface
    {
        return $this->data_aktualizacji;
    }

    public function setDataAktualizacji(\DateTimeInterface $data_aktualizacji): self
    {
        $this->data_aktualizacji = $data_aktualizacji;

        return $this;
    }

    public function __construct()
    {
        $this->Zdjecia = new ArrayCollection();
        $this->Egzemplarze = new ArrayCollection();
        $this->Komentarze = new ArrayCollection();

        $this->data_aktualizacji = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwa(): ?string
    {
        return $this->Nazwa;
    }

    public function setNazwa(string $Nazwa): self
    {
        $this->Nazwa = $Nazwa;

        return $this;
    }

    public function getIdKategoria(): ?Kategoria
    {
        return $this->id_Kategoria;
    }

    public function setIdKategoria(?Kategoria $id_Kategoria): self
    {
        $this->id_Kategoria = $id_Kategoria;

        return $this;
    }

    public function getIdWydawnictwo(): ?Wydawnictwo
    {
        return $this->id_Wydawnictwo;
    }

    public function setIdWydawnictwo(?Wydawnictwo $id_Wydawnictwo): self
    {
        $this->id_Wydawnictwo = $id_Wydawnictwo;

        return $this;
    }

    public function getLiczbaGraczyMin(): ?int
    {
        return $this->Liczba_graczy_min;
    }

    public function setLiczbaGraczyMin(int $Liczba_graczy_min): self
    {
        $this->Liczba_graczy_min = $Liczba_graczy_min;

        return $this;
    }

    public function getLiczbaGraczyMax(): ?int
    {
        return $this->Liczba_graczy_max;
    }

    public function setLiczbaGraczyMax(int $Liczba_graczy_max): self
    {
        $this->Liczba_graczy_max = $Liczba_graczy_max;

        return $this;
    }

    public function getWiekOdLat(): ?int
    {
        return $this->Wiek_od_lat;
    }

    public function setWiekOdLat(int $Wiek_od_lat): self
    {
        $this->Wiek_od_lat = $Wiek_od_lat;

        return $this;
    }

    public function getSredniCzasGry(): ?\DateTimeInterface
    {
        return $this->Sredni_czas_gry;
    }

    public function setSredniCzasGry(\DateTimeInterface $Sredni_czas_gry): self
    {
        $this->Sredni_czas_gry = $Sredni_czas_gry;

        return $this;
    }

    public function getOpis(): ?string
    {
        return $this->Opis;
    }

    public function setOpis(string $Opis): self
    {
        $this->Opis = $Opis;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->Status;
    }

    public function setStatus(bool $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getCena(): ?int
    {
        return $this->Cena;
    }

    public function setCena(int $Cena): self
    {
        $this->Cena = $Cena;

        return $this;
    }

    public function getKaucja(): ?int
    {
        return $this->Kaucja;
    }

    public function setKaucja(int $Kaucja): self
    {
        $this->Kaucja = $Kaucja;

        return $this;
    }

    /**
     * @return Collection<int, Zdjecie>
     */
    public function getZdjecia(): Collection
    {
        return $this->Zdjecia;
    }

    /**
     * @return Collection<int, Egzemplarz>
     */
    public function getEgzemplarze(): Collection
    {
        return $this->Egzemplarze;
    }

    public function addEgzemplarze(Egzemplarz $egzemplarze): self
    {
        if (!$this->Egzemplarze->contains($egzemplarze)) {
            $this->Egzemplarze[] = $egzemplarze;
            $egzemplarze->setIdGra($this);
        }

        return $this;
    }

    public function removeEgzemplarze(Egzemplarz $egzemplarze): self
    {
        if ($this->Egzemplarze->removeElement($egzemplarze)) {
            // set the owning side to null (unless already changed)
            if ($egzemplarze->getIdGra() === $this) {
                $egzemplarze->setIdGra(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Komentarz>
     */
    public function getKomentarze(): Collection
    {
        return $this->Komentarze;
    }

    public function addKomentarze(Komentarz $komentarze): self
    {
        if (!$this->Komentarze->contains($komentarze)) {
            $this->Komentarze[] = $komentarze;
            $komentarze->setIdGra($this);
        }

        return $this;
    }

    public function removeKomentarze(Komentarz $komentarze): self
    {
        if ($this->Komentarze->removeElement($komentarze)) {
            // set the owning side to null (unless already changed)
            if ($komentarze->getIdGra() === $this) {
                $komentarze->setIdGra(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Nazwa;
    }

    public function addZdjecium(Zdjecie $zdjecium): self
    {
        //dd($zdjecium);
        if (!$this->Zdjecia->contains($zdjecium)) {
            $this->Zdjecia[] = $zdjecium;
            $zdjecium->setIdGra($this);
        }

      //  dd($zdjecium);
        return $this;
    }

    public function removeZdjecium(Zdjecie $zdjecium): self
    {
        if ($this->Zdjecia->removeElement($zdjecium)) {
            // set the owning side to null (unless already changed)
            if ($zdjecium->getIdGra() === $this) {
                $zdjecium->setIdGra(null);
            }
        }

        return $this;
    }
}