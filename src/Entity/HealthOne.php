<?php

namespace App\Entity;

use App\Repository\HealthOneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HealthOneRepository::class)
 */
class HealthOne
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=HealthOne::class, inversedBy="healthOnes")
     */
    private $artikel;

    /**
     * @ORM\ManyToMany(targetEntity=HealthOne::class, mappedBy="artikel")
     */
    private $healthOnes;

    public function __construct()
    {
        $this->artikel = new ArrayCollection();
        $this->healthOnes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|self[]
     */
    public function getArtikel(): Collection
    {
        return $this->artikel;
    }

    public function addArtikel(self $artikel): self
    {
        if (!$this->artikel->contains($artikel)) {
            $this->artikel[] = $artikel;
        }

        return $this;
    }

    public function removeArtikel(self $artikel): self
    {
        $this->artikel->removeElement($artikel);

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getHealthOnes(): Collection
    {
        return $this->healthOnes;
    }

    public function addHealthOne(self $healthOne): self
    {
        if (!$this->healthOnes->contains($healthOne)) {
            $this->healthOnes[] = $healthOne;
            $healthOne->addArtikel($this);
        }

        return $this;
    }

    public function removeHealthOne(self $healthOne): self
    {
        if ($this->healthOnes->removeElement($healthOne)) {
            $healthOne->removeArtikel($this);
        }

        return $this;
    }
}
