<?php

namespace App\Entity;

use App\Repository\UzytkownikRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UzytkownikRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Istnieje już konto o podanym adresie e-mail!')]
class Uzytkownik implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $imie;

    #[ORM\Column(type: 'string', length: 255)]
    private $nazwisko;

    #[ORM\Column(type: 'string', length: 255)]
    private $ulica;

    #[ORM\Column(type: 'string', length: 255)]
    private $nr_domu;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nr_lokalu;

    #[ORM\Column(type: 'integer')]
    private $nr_tel_kom;

    #[ORM\Column(type: 'boolean')]
    private $powiadomienie_o_nowosciach;

    #[ORM\Column(type: 'string', length: 255)]
    private $nick;

    #[ORM\Column(type: 'boolean')]
    private $status;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
      //  $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getImie(): ?string
    {
        return $this->imie;
    }

    public function setImie(string $imie): self
    {
        $this->imie = $imie;

        return $this;
    }

    public function getNazwisko(): ?string
    {
        return $this->nazwisko;
    }

    public function setNazwisko(string $nazwisko): self
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    public function getUlica(): ?string
    {
        return $this->ulica;
    }

    public function setUlica(string $ulica): self
    {
        $this->ulica = $ulica;

        return $this;
    }

    public function getNrDomu(): ?string
    {
        return $this->nr_domu;
    }

    public function setNrDomu(string $nr_domu): self
    {
        $this->nr_domu = $nr_domu;

        return $this;
    }

    public function getNrLokalu(): ?string
    {
        return $this->nr_lokalu;
    }

    public function setNrLokalu(?string $nr_lokalu): self
    {
        $this->nr_lokalu = $nr_lokalu;

        return $this;
    }

    public function getNrTelKom(): ?int
    {
        return $this->nr_tel_kom;
    }

    public function setNrTelKom(int $nr_tel_kom): self
    {
        $this->nr_tel_kom = $nr_tel_kom;

        return $this;
    }

    public function getPowiadomienieONowosciach(): ?bool
    {
        return $this->powiadomienie_o_nowosciach;
    }

    public function setPowiadomienieONowosciach(bool $powiadomienie_o_nowosciach): self
    {
        $this->powiadomienie_o_nowosciach = $powiadomienie_o_nowosciach;

        return $this;
    }

    public function getNick(): ?string
    {
        return $this->nick;
    }

    public function setNick(string $nick): self
    {
        $this->nick = $nick;

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

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

     /**
     * @var string clear password for backend
     */
    private $clearpassword;

    /**
     * @return string
     */
    public function getClearpassword(): string
    {
        if( $this->clearpassword == null ) return "";
        return $this->clearpassword;
    }

    /**
     * @param string $clearpassword
     */
    public function setClearpassword(string $clearpassword): void
    {
        $this->clearpassword = $clearpassword;
    }

    public function __toString()
    {
        return $this->nazwisko.' '.$this->imie.'-'.$this->nick;
    }

    public function getIsVerified(): ?bool
    {
        return $this->isVerified;
    }
}
