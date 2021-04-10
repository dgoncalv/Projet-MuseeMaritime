<?php

namespace App\Entity;

use App\Repository\MuseeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MuseeRepository::class)
 */
class Musee
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ("infoMusee")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     * @Groups ("infoMusee")
     */
    private $horaireOuverture;

    /**
     * @ORM\Column(type="time")
     * @Groups ("infoMusee")
     */
    private $horaireFermeture;

    /**
     * @ORM\OneToMany(targetEntity=Bateau::class, mappedBy="musee")
     * @Groups ("infoMusee")
     */
    private $bateaux;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ("infoMusee")
     */
    private $jourFermeture;

    /**
     * Musee constructor.
     */
    public function __construct()
    {
        $this->bateaux = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|Bateau[]
     */
    public function getBateaux(): Collection
    {
        return $this->bateaux;
    }

    /**
     * @param Bateau $bateaux
     * @return $this
     */
    public function addBateaux(Bateau $bateaux): self
    {
        if (!$this->bateaux->contains($bateaux)) {
            $this->bateaux[] = $bateaux;
            $bateaux->setMusee($this);
        }

        return $this;
    }

    /**
     * @param Bateau $bateaux
     * @return $this
     */
    public function removeBateaux(Bateau $bateaux): self
    {
        if ($this->bateaux->removeElement($bateaux)) {
            // set the owning side to null (unless already changed)
            if ($bateaux->getMusee() === $this) {
                $bateaux->setMusee(null);
            }
        }

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
     * @param string $jourFermeture
     * @return $this
     */
    public function setJourFermeture(string $jourFermeture): self
    {
        $this->jourFermeture = $jourFermeture;

        return $this;
    }
}
