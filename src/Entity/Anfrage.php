<?php

namespace App\Entity;

use App\Repository\AnfrageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnfrageRepository::class)]
class Anfrage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titel = null;

    #[ORM\Column(length: 255)]
    private ?string $vorname = null;

    #[ORM\Column(length: 255)]
    private ?string $nachname = null;

    #[ORM\Column(length: 255)]
    private ?string $strasse = null;

    #[ORM\Column]
    private ?int $plz = null;

    #[ORM\Column(length: 255)]
    private ?string $ort = null;

    #[ORM\Column(length: 255)]
    private ?string $telnr = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'anfrages')]
    private ?Houses $house = null;

    #[ORM\Column]
    private ?int $tage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $anfahrt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $abfahrt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $valuta = null;

    #[ORM\Column]
    private ?bool $bestaetigung = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitel(): ?string
    {
        return $this->titel;
    }

    public function setTitel(string $titel): self
    {
        $this->titel = $titel;

        return $this;
    }

    public function getVorname(): ?string
    {
        return $this->vorname;
    }

    public function setVorname(string $vorname): self
    {
        $this->vorname = $vorname;

        return $this;
    }

    public function getNachname(): ?string
    {
        return $this->nachname;
    }

    public function setNachname(string $nachname): self
    {
        $this->nachname = $nachname;

        return $this;
    }

    public function getStrasse(): ?string
    {
        return $this->strasse;
    }

    public function setStrasse(string $strasse): self
    {
        $this->strasse = $strasse;

        return $this;
    }

    public function getPlz(): ?int
    {
        return $this->plz;
    }

    public function setPlz(int $plz): self
    {
        $this->plz = $plz;

        return $this;
    }

    public function getOrt(): ?string
    {
        return $this->ort;
    }

    public function setOrt(string $ort): self
    {
        $this->ort = $ort;

        return $this;
    }

    public function getTelnr(): ?string
    {
        return $this->telnr;
    }

    public function setTelnr(string $telnr): self
    {
        $this->telnr = $telnr;

        return $this;
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

    public function getHouse(): ?Houses
    {
        return $this->house;
    }

    public function setHouse(?Houses $house): self
    {
        $this->house = $house;

        return $this;
    }

    public function getTage(): ?int
    {
        return $this->tage;
    }

    public function setTage(int $tage): self
    {
        $this->tage = $tage;

        return $this;
    }

    public function getAnfahrt(): ?\DateTimeInterface
    {
        return $this->anfahrt;
    }

    public function setAnfahrt(\DateTimeInterface $anfahrt): self
    {
        $this->anfahrt = $anfahrt;

        return $this;
    }

    public function getAbfahrt(): ?\DateTimeInterface
    {
        return $this->abfahrt;
    }

    public function setAbfahrt(\DateTimeInterface $abfahrt): self
    {
        $this->abfahrt = $abfahrt;

        return $this;
    }

    public function getValuta(): ?\DateTimeInterface
    {
        return $this->valuta;
    }

    public function setValuta(\DateTimeInterface $valuta): self
    {
        $this->valuta = $valuta;

        return $this;
    }

    public function isBestaetigung(): ?bool
    {
        return $this->bestaetigung;
    }

    public function setBestaetigung(bool $bestaetigung): self
    {
        $this->bestaetigung = $bestaetigung;

        return $this;
    }
}
