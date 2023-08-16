<?php

declare(strict_types=1);

namespace App\Dto;

class Map
{
    private int $id;
    private string $nom;
    private string $infos;
    /**
     * @var Path[]
     */
    private array $paths;
    /**
     * @var Joueur[]
     */
    private array $joueurs;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Map
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): Map
    {
        $this->nom = $nom;

        return $this;
    }

    public function getInfos(): string
    {
        return $this->infos;
    }

    public function setInfos(string $infos): Map
    {
        $this->infos = $infos;

        return $this;
    }

    /**
     * @return Path[]
     */
    public function getPaths(): array
    {
        return $this->paths;
    }

    /**
     * @param Path[] $paths
     */
    public function setPaths(array $paths): Map
    {
        $this->paths = $paths;

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
    public function setJoueurs(array $joueurs): Map
    {
        $this->joueurs = $joueurs;

        return $this;
    }
}
