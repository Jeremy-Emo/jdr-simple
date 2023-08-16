<?php

declare(strict_types=1);

namespace App\Dto;

class Groupe
{
    private string $nom;
    private int $aventureId;
    /**
     * @var int[]
     */
    private array $joueurIds;

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): Groupe
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAventureId(): int
    {
        return $this->aventureId;
    }

    public function setAventureId(int $aventureId): Groupe
    {
        $this->aventureId = $aventureId;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getJoueurIds(): array
    {
        return $this->joueurIds;
    }

    /**
     * @param int[] $joueurIds
     */
    public function setJoueurIds(array $joueurIds): Groupe
    {
        $this->joueurIds = $joueurIds;

        return $this;
    }
}
