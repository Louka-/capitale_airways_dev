<?php

namespace App\Entity;

use App\Repository\FlightRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlightRepository::class)
 */
class Flight
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $numero;

    /**
     * @ORM\Column(type="time")
     */
    private $schedule;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $reduction;

    /**
     * @ORM\ManyToOne(targetEntity=city::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $departure;

    /**
     * @ORM\ManyToOne(targetEntity=city::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrival;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getSchedule(): ?\DateTimeInterface
    {
        return $this->schedule;
    }

    public function setSchedule(\DateTimeInterface $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getReduction(): ?bool
    {
        return $this->reduction;
    }

    public function setReduction(?bool $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getDeparture(): ?city
    {
        return $this->departure;
    }

    public function setDeparture(?city $departure): self
    {
        $this->departure = $departure;

        return $this;
    }

    public function getArrival(): ?city
    {
        return $this->arrival;
    }

    public function setArrival(?city $arrival): self
    {
        $this->arrival = $arrival;

        return $this;
    }
}
