<?php

declare(strict_types=1);

namespace App\Dto;

class Aventure
{
    private string $nom;
    private string $synopsis;
    /**
     * @var Joueur[]
     */
    private array $joueurs;

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): Aventure
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): Aventure
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * @return Joueur[]
     */
    public function getJoueurs(): array
    {
        return $this->joueurs;
    }

    /**
     * @param Joueur[] $joueurs
     */
    public function setJoueurs(array $joueurs): Aventure
    {
        $this->joueurs = $joueurs;

        return $this;
    }
}
