<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotoRepository")
 */
class Photo
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $Extention;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DatedAjout;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Slide", inversedBy="photos")
     */
    private $Slide;

    /**
     * @ORM\Column(type="integer")
     */
    private $horizontal;

    /**
     * @ORM\Column(type="integer")
     */
    private $vertical;

    public function __construct()
    {
        $this->Slide = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getExtention(): ?string
    {
        return $this->Extention;
    }

    public function setExtention(string $Extention): self
    {
        $this->Extention = $Extention;

        return $this;
    }

    public function getDatedAjout(): ?\DateTimeInterface
    {
        return $this->DatedAjout;
    }

    public function setDatedAjout(\DateTimeInterface $DatedAjout): self
    {
        $this->DatedAjout = $DatedAjout;

        return $this;
    }

    /**
     * @return Collection|Slide[]
     */
    public function getSlide(): Collection
    {
        return $this->Slide;
    }

    public function addSlide(Slide $slide): self
    {
        if (!$this->Slide->contains($slide)) {
            $this->Slide[] = $slide;
        }

        return $this;
    }

    public function removeSlide(Slide $slide): self
    {
        if ($this->Slide->contains($slide)) {
            $this->Slide->removeElement($slide);
        }

        return $this;
    }

    public function getHorizontal(): ?int
    {
        return $this->horizontal;
    }

    public function setHorizontal(int $horizontal): self
    {
        $this->horizontal = $horizontal;

        return $this;
    }

    public function getVertical(): ?int
    {
        return $this->vertical;
    }

    public function setVertical(int $vertical): self
    {
        $this->vertical = $vertical;

        return $this;
    }
}
