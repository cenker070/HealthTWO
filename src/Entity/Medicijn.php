<?php

namespace App\Entity;

use App\Repository\MedicijnRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicijnRepository::class)
 */
class Medicijn
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $werking;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bijwerkingen;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $prijs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getWerking(): ?string
    {
        return $this->werking;
    }

    public function setWerking(string $werking): self
    {
        $this->werking = $werking;

        return $this;
    }

    public function getBijwerkingen(): ?string
    {
        return $this->bijwerkingen;
    }

    public function setBijwerkingen(string $bijwerkingen): self
    {
        $this->bijwerkingen = $bijwerkingen;

        return $this;
    }

    public function getPrijs(): ?string
    {
        return $this->prijs;
    }

    public function setPrijs(?string $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }
}
