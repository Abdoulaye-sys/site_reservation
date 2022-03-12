<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    
    /**
     * @ORM\Column(type="datetime")
     */
    private $startedDate;

    /**
     * @ORM\OneToOne(targetEntity=Expediteur::class, mappedBy="reservation", cascade={"persist", "remove"})
     */
    private $expediteur;

    /**
     * @ORM\OneToOne(targetEntity=Receveur::class, mappedBy="reservation", cascade={"persist", "remove"})
     */
    private $receveur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villeDepart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villeArrivee;

    /**
     * @ORM\OneToOne(targetEntity=Colis::class, inversedBy="reservation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $colis;



    public function getId(): ?int
    {
        return $this->id;
    }

   
    

    public function getStartedDate(): ?\DateTimeInterface
    {
        return $this->startedDate;
    }

    public function setStartedDate(\DateTimeInterface $startedDate): self
    {
        $this->startedDate = $startedDate;

        return $this;
    }

    public function getExpediteur(): ?Expediteur
    {
        return $this->expediteur;
    }

    public function setExpediteur(Expediteur $expediteur): self
    {
        // set the owning side of the relation if necessary
        if ($expediteur->getReservation() !== $this) {
            $expediteur->setReservation($this);
        }

        $this->expediteur = $expediteur;

        return $this;
    }

    public function getReceveur(): ?Receveur
    {
        return $this->receveur;
    }

    public function setReceveur(Receveur $receveur): self
    {
        // set the owning side of the relation if necessary
        if ($receveur->getReservation() !== $this) {
            $receveur->setReservation($this);
        }

        $this->receveur = $receveur;

        return $this;
    }

    public function getVilleDepart(): ?string
    {
        return $this->villeDepart;
    }

    public function setVilleDepart(string $villeDepart): self
    {
        $this->villeDepart = $villeDepart;

        return $this;
    }

    public function getVilleArrivee(): ?string
    {
        return $this->villeArrivee;
    }

    public function setVilleArrivee(string $villeArrivee): self
    {
        $this->villeArrivee = $villeArrivee;

        return $this;
    }

    public function getColis(): ?Colis
    {
        return $this->colis;
    }

    public function setColis(Colis $colis): self
    {
        $this->colis = $colis;

        return $this;
    }
}
