<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="integer")
     */
    private $nbPersonne;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     */
    private $horaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telCli;

    /**
     * @ORM\ManyToOne(targetEntity=Bateau::class, inversedBy="reservation")
     */
    private $bateau;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getNbPersonne(): ?int
    {
        return $this->nbPersonne;
    }

    /**
     * @param int $nbPersonne
     * @return $this
     */
    public function setNbPersonne(int $nbPersonne): self
    {
        $this->nbPersonne = $nbPersonne;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return $this
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return $this
     */
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface $date
     * @return $this
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getHoraire(): ?\DateTimeInterface
    {
        return $this->horaire;
    }

    /**
     * @param \DateTimeInterface $horaire
     * @return $this
     */
    public function setHoraire(\DateTimeInterface $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTelCli(): ?string
    {
        return $this->telCli;
    }

    /**
     * @param string $telCli
     * @return $this
     */
    public function setTelCli(string $telCli): self
    {
        $this->telCli = $telCli;

        return $this;
    }

    /**
     * @return Bateau|null
     */
    public function getBateau(): ?Bateau
    {
        return $this->bateau;
    }

    /**
     * @param Bateau|null $bateau
     * @return $this
     */
    public function setBateau(?Bateau $bateau): self
    {
        $this->bateau = $bateau;

        return $this;
    }
}
