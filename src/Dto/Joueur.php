<?php

declare(strict_types=1);

namespace App\Dto;

class Joueur
{
    private int $id;
    private string $nom;
    private Personnage $personnage;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Joueur
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): Joueur
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPersonnage(): Personnage
    {
        return $this->personnage;
    }

    public function setPersonnage(Personnage $personnage): Joueur
    {
        $this->personnage = $personnage;

        return $this;
    }
}
