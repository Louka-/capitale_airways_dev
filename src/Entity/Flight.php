<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FlightRepository;


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
     * 
     */
    private $numero;

    /**
     * @ORM\Column(type="time")
     * 
     */
    private $schedule;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="Entrez un prix entre 100 et 500.")
     * @Assert\Range(
     *      min= 100,
     *      max= 500,
     *      minMessage = "Au minimum 100",
     *      maxMessage = "Au maximum 500"
     * )
     */
    private $price;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $reduction;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="flights")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotEqualTo(
     *          propertyPath="arrival",
     *          message="Le départ et l'arrivée doivent être différents.")
     */
    private $departure;

    /**
     * @ORM\ManyToOne(targetEntity=City::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrival;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $seat;


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

    public function getSeat(): ?int
    {
        return $this->seat;
    }

    public function setSeat(?int $seat): self
    {
        $this->seat = $seat;

        return $this;
    }


}
