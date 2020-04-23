<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PresentationRepository")
 */
class Presentation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DatedeCreation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DatedeModification;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="presentations")
     */
    private $IdUser;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Slide", mappedBy="presentation")
     */
    private $slides;

    public function __construct()
    {
        $this->slides = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatedeCreation(): ?\DateTimeInterface
    {
        return $this->DatedeCreation;
    }

    public function setDatedeCreation(\DateTimeInterface $DatedeCreation): self
    {
        $this->DatedeCreation = $DatedeCreation;

        return $this;
    }

    public function getDatedeModification(): ?\DateTimeInterface
    {
        return $this->DatedeModification;
    }

    public function setDatedeModification(\DateTimeInterface $DatedeModification): self
    {
        $this->DatedeModification = $DatedeModification;

        return $this;
    }

    public function getIdUser(): ?Utilisateur
    {
        return $this->IdUser;
    }

    public function setIdUser(?Utilisateur $IdUser): self
    {
        $this->IdUser = $IdUser;

        return $this;
    }

    /**
     * @return Collection|Slide[]
     */
    public function getSlides(): Collection
    {
        return $this->slides;
    }

    public function addSlide(Slide $slide): self
    {
        if (!$this->slides->contains($slide)) {
            $this->slides[] = $slide;
            $slide->setPresentation($this);
        }

        return $this;
    }

    public function removeSlide(Slide $slide): self
    {
        if ($this->slides->contains($slide)) {
            $this->slides->removeElement($slide);
            // set the owning side to null (unless already changed)
            if ($slide->getPresentation() === $this) {
                $slide->setPresentation(null);
            }
        }

        return $this;
    }
}
