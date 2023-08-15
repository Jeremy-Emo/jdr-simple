<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MapRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MapRepository::class)]
class Map
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $nom;

    #[ORM\ManyToOne(inversedBy: 'maps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Aventure $aventure = null;

    #[ORM\Column(type: Types::TEXT)]
    private string $infos = '';

    #[ORM\OneToMany(mappedBy: 'fromMap', targetEntity: Path::class, orphanRemoval: true)]
    private Collection $pathsFrom;

    #[ORM\OneToMany(mappedBy: 'toMap', targetEntity: Path::class, orphanRemoval: true)]
    private Collection $pathsTo;

    public function __toString(): string
    {
        return $this->getNom();
    }

    public function __construct()
    {
        $this->pathsFrom = new ArrayCollection();
        $this->pathsTo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAventure(): ?Aventure
    {
        return $this->aventure;
    }

    public function setAventure(?Aventure $aventure): static
    {
        $this->aventure = $aventure;

        return $this;
    }

    public function getInfos(): string
    {
        return $this->infos;
    }

    public function setInfos(string $infos): static
    {
        $this->infos = $infos;

        return $this;
    }

    /**
     * @return Collection<int, Path>
     */
    public function getPathsFrom(): Collection
    {
        return $this->pathsFrom;
    }

    public function addPathsFrom(Path $pathsFrom): static
    {
        if (!$this->pathsFrom->contains($pathsFrom)) {
            $this->pathsFrom->add($pathsFrom);
            $pathsFrom->setFromMap($this);
        }

        return $this;
    }

    public function removePathsFrom(Path $pathsFrom): static
    {
        if ($this->pathsFrom->removeElement($pathsFrom)) {
            // set the owning side to null (unless already changed)
            if ($pathsFrom->getFromMap() === $this) {
                $pathsFrom->setFromMap(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Path>
     */
    public function getPathsTo(): Collection
    {
        return $this->pathsTo;
    }

    public function addPathsTo(Path $pathsTo): static
    {
        if (!$this->pathsTo->contains($pathsTo)) {
            $this->pathsTo->add($pathsTo);
            $pathsTo->setToMap($this);
        }

        return $this;
    }

    public function removePathsTo(Path $pathsTo): static
    {
        if ($this->pathsTo->removeElement($pathsTo)) {
            // set the owning side to null (unless already changed)
            if ($pathsTo->getToMap() === $this) {
                $pathsTo->setToMap(null);
            }
        }

        return $this;
    }
}