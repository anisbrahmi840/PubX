<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GouvernoratRepository")
 */
class Gouvernorat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Maison", mappedBy="Gouvernorat")
     */
    private $maisons;

    public function __construct()
    {
        $this->maisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Maison[]
     */
    public function getMaisons(): Collection
    {
        return $this->maisons;
    }

    public function addMaison(Maison $maison): self
    {
        if (!$this->maisons->contains($maison)) {
            $this->maisons[] = $maison;
            $maison->setGouvernorat($this);
        }

        return $this;
    }

    public function removeMaison(Maison $maison): self
    {
        if ($this->maisons->contains($maison)) {
            $this->maisons->removeElement($maison);
            // set the owning side to null (unless already changed)
            if ($maison->getGouvernorat() === $this) {
                $maison->setGouvernorat(null);
            }
        }

        return $this;
    }
}
