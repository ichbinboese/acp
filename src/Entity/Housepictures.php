<?php

namespace App\Entity;

use App\Repository\HousepicturesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HousepicturesRepository::class)]
class Housepictures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $picturename = null;

    #[ORM\Column(length: 255)]
    private ?string $picturepath = null;

    #[ORM\ManyToOne(inversedBy: 'housepictures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Houses $house = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicturename(): ?string
    {
        return $this->picturename;
    }

    public function setPicturename(string $picturename): self
    {
        $this->picturename = $picturename;

        return $this;
    }

    public function getPicturepath(): ?string
    {
        return $this->picturepath;
    }

    public function setPicturepath(string $picturepath): self
    {
        $this->picturepath = $picturepath;

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
}
