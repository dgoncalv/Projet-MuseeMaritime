<?php

namespace App\Entity;

use App\Repository\BateauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=BateauRepository::class)
 */
class Bateau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ("listeBateaux")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ("listeBateaux")
     */
    private $nom;

   /**
     * @ORM\Column(type="string", length=2500, nullable=true)
     * @Groups ("listeBateaux")
     */
    private $historique;

    /**
     * @ORM\Column(type="time", nullable=true)
     * @Groups ("listeBateaux")
     */
    private $horaireOuverture;

    /**
     * @ORM\Column(type="time", nullable=true)
     * @Groups ("listeBateaux")
     */
    private $horaireFermeture;

    /**
     * @ORM\Column(type="float")
     * @Groups ("listeBateaux")
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     * @Groups ("listeBateaux")
     */
    private $longitude;
    /**
     * @ORM\Column(type="string", length=2500, nullable=true)
     * @Groups ("listeBateaux")
     */
    private $citation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ("listeBateaux")
     */
    private $auteurCitation;

    /**
     * @ORM\Column(type="string", length=2500, nullable=true)
     * @Groups ("listeBateaux")
     */
    private $jourFermeture;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups ("listeBateaux")
     */
    private $nbPersonneMax;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="bateau")
     */
    private $reservation;

    /**
     * @ORM\ManyToOne(targetEntity=Musee::class, inversedBy="bateaux")
     */
    private $musee;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estVisitable;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $longueur;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $largeur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $anneeConstruction;

    /**
     * Bateau constructor.
     */
    public function __construct()
    {
        $this->reservation = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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
    public function getHistorique(): ?string
    {
        return $this->historique;
    }

    /**
     * @param string $historique
     * @return $this
     */
    public function setHistorique(string $historique): self
    {
        $this->historique = $historique;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getHoraireOuverture(): ?\DateTimeInterface
    {
        return $this->horaireOuverture;
    }

    /**
     * @param \DateTimeInterface $horaireOuverture
     * @return $this
     */
    public function setHoraireOuverture(\DateTimeInterface $horaireOuverture): self
    {
        $this->horaireOuverture = $horaireOuverture;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getHoraireFermeture(): ?\DateTimeInterface
    {
        return $this->horaireFermeture;
    }

    /**
     * @param \DateTimeInterface $horaireFermeture
     * @return $this
     */
    public function setHoraireFermeture(\DateTimeInterface $horaireFermeture): self
    {
        $this->horaireFermeture = $horaireFermeture;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return $this
     */
    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return $this
     */
    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCitation(): ?string
    {
        return $this->citation;
    }

    /**
     * @param string|null $citation
     * @return $this
     */
    public function setCitation(?string $citation): self
    {
        $this->citation = $citation;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuteurCitation(): ?string
    {
        return $this->auteurCitation;
    }

    /**
     * @param string|null $auteurCitation
     * @return $this
     */
    public function setAuteurCitation(?string $auteurCitation): self
    {
        $this->auteurCitation = $auteurCitation;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getJourFermeture(): ?string
    {
        return $this->jourFermeture;
    }

    /**
     * @param string|null $jourFermeture
     * @return $this
     */
    public function setJourFermeture(?string $jourFermeture): self
    {
        $this->jourFermeture = $jourFermeture;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNbPersonneMax(): ?int
    {
        return $this->nbPersonneMax;
    }

    /**
     * @param int $nbPersonneMax
     * @return $this
     */
    public function setNbPersonneMax(int $nbPersonneMax): self
    {
        $this->nbPersonneMax = $nbPersonneMax;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservation(): Collection
    {
        return $this->reservation;
    }

    /**
     * @param Reservation $reservation
     * @return $this
     */
    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservation->contains($reservation)) {
            $this->reservation[] = $reservation;
            $reservation->setBateau($this);
        }

        return $this;
    }

    /**
     * @param Reservation $reservation
     * @return $this
     */
    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservation->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getBateau() === $this) {
                $reservation->setBateau(null);
            }
        }

        return $this;
    }


    /**
     * @return Musee|null
     */
    public function getMusee(): ?Musee
    {
        return $this->musee;
    }

    /**
     * @param Musee|null $musee
     * @return $this
     */
    public function setMusee(?Musee $musee): self
    {
        $this->musee = $musee;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getEstVisitable(): ?bool
    {
        return $this->estVisitable;
    }

    /**
     * @param bool $estVisitable
     * @return $this
     */
    public function setEstVisitable(bool $estVisitable): self
    {
        $this->estVisitable = $estVisitable;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLongueur(): ?float
    {
        return $this->longueur;
    }

    /**
     * @param float $longueur
     * @return $this
     */
    public function setLongueur(float $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    /**
     * @param float|null $largeur
     * @return $this
     */
    public function setLargeur(?float $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAnneeConstruction(): ?int
    {
        return $this->anneeConstruction;
    }

    /**
     * @param int|null $anneeConstruction
     * @return $this
     */
    public function setAnneeConstruction(?int $anneeConstruction): self
    {
        $this->anneeConstruction = $anneeConstruction;

        return $this;
    }
}
