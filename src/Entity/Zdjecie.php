<?php

namespace App\Entity;

use App\Repository\ZdjecieRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
//use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ZdjecieRepository::class)]
/**
 * @Vich\Uploadable()
 **/
class Zdjecie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Gra::class, inversedBy: 'Zdjecia')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_Gra;

    #[ORM\Column(type: 'string', length: 255)]
    private $zdjecie;
  
    #[Vich\UploadableField(mapping: "gra_galeria", fileNameProperty: "zdjecie")]
    private $zdjeciePlik;

    #[ORM\Column(type: 'datetime', nullable:false)]
    private $data_aktualizacji;

    public function getZdjeciePlik(): ?File
    {
        return $this->zdjeciePlik;
    }

    public function setZdjeciePlik(?File $zdjeciePlik = null): void
    { 
        //dd($zdjeciePlik);

        $this->zdjeciePlik = $zdjeciePlik;

        if($zdjeciePlik)
        {
            $this->data_aktualizacji = new \DateTimeImmutable();
        }

       // return $this;

    }

    public function getZdjecie(): ?string
    {
        return $this->zdjecie;
    }

    public function setZdjecie(?string $zdjecie): self
    {
      //  dd($zdjecie);
        $this->zdjecie = $zdjecie;

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



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdGra(): ?Gra
    {
        return $this->id_Gra;
    }

    public function setIdGra(?Gra $id_Gra): self
    {
        $this->id_Gra = $id_Gra;

        return $this;
    }

    public function __construct()
    {
        $this->data_aktualizacji = new \DateTime();
    }
}