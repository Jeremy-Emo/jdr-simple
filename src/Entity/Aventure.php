<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AventureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AventureRepository::class)]
class Aventure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $nom;

    #[ORM\Column(type: Types::TEXT)]
    private string $synopsis = '';

    #[ORM\OneToMany(mappedBy: 'aventure', targetEntity: Map::class)]
    private Collection $maps;

    #[ORM\OneToOne(mappedBy: 'aventure', cascade: ['persist', 'remove'])]
    private ?Groupe $groupe = null;

    public function __toString(): string
    {
        return $this->getNom();
    }

    public function __construct()
    {
        $this->maps = new ArrayCollection();
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

    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): static
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * @return Collection<int, Map>
     */
    public function getMaps(): Collection
    {
        return $this->maps;
    }

    public function addMap(Map $map): static
    {
        if (!$this->maps->contains($map)) {
            $this->maps->add($map);
            $map->setAventure($this);
        }

        return $this;
    }

    public function removeMap(Map $map): static
    {
        if ($this->maps->removeElement($map)) {
            // set the owning side to null (unless already changed)
            if ($map->getAventure() === $this) {
                $map->setAventure(null);
            }
        }

        return $this;
    }

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupe $groupe): static
    {
        // unset the owning side of the relation if necessary
        if (null === $groupe && null !== $this->groupe) {
            $this->groupe->setAventure(null);
        }

        // set the owning side of the relation if necessary
        if (null !== $groupe && $groupe->getAventure() !== $this) {
            $groupe->setAventure($this);
        }

        $this->groupe = $groupe;

        return $this;
    }
}
