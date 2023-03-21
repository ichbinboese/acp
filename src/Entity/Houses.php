<?php

namespace App\Entity;

use App\Repository\HousesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HousesRepository::class)]
class Houses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $housename = null;

    #[ORM\Column]
    private ?float $priceperday = null;

    #[ORM\Column(length: 255)]
    private ?string $mainpicture = null;

    #[ORM\OneToMany(mappedBy: 'house', targetEntity: Housepictures::class, orphanRemoval: true)]
    private Collection $housepictures;

    public function __construct()
    {
        $this->housepictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHousename(): ?string
    {
        return $this->housename;
    }

    public function setHousename(string $housename): self
    {
        $this->housename = $housename;

        return $this;
    }

    public function getPriceperday(): ?string
    {
        return $this->priceperday;
    }

    public function setPriceperday(string $priceperday): self
    {
        $this->priceperday = $priceperday;

        return $this;
    }

    public function getMainpicture(): ?string
    {
        return $this->mainpicture;
    }

    public function setMainpicture(string $mainpicture): self
    {
        $this->mainpicture = $mainpicture;

        return $this;
    }

    /**
     * @return Collection<int, Housepictures>
     */
    public function getHousepictures(): Collection
    {
        return $this->housepictures;
    }

    public function addHousepicture(Housepictures $housepicture): self
    {
        if (!$this->housepictures->contains($housepicture)) {
            $this->housepictures->add($housepicture);
            $housepicture->setHouse($this);
        }

        return $this;
    }

    public function removeHousepicture(Housepictures $housepicture): self
    {
        if ($this->housepictures->removeElement($housepicture)) {
            // set the owning side to null (unless already changed)
            if ($housepicture->getHouse() === $this) {
                $housepicture->setHouse(null);
            }
        }

        return $this;
    }
}
