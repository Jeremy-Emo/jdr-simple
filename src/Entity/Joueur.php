<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JoueurRepository::class)]
class Joueur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $nom;

    #[ORM\ManyToOne(inversedBy: 'joueurs')]
    private ?Groupe $groupe = null;

    #[ORM\ManyToOne(inversedBy: 'joueurs')]
    private ?Map $position = null;

    public function __toString(): string
    {
        return $this->getNom();
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

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupe $groupe): static
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getPosition(): ?Map
    {
        return $this->position;
    }

    public function setPosition(?Map $position): static
    {
        $this->position = $position;

        return $this;
    }
}
