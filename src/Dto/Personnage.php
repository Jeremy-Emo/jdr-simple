<?php

declare(strict_types=1);

namespace App\Dto;

class Personnage
{
    private string $nom;
    private string $job;
    private int $force;
    private int $esprit;
    private int $agilite;
    private int $charisme;

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): Personnage
    {
        $this->nom = $nom;

        return $this;
    }

    public function getJob(): string
    {
        return $this->job;
    }

    public function setJob(string $job): Personnage
    {
        $this->job = $job;

        return $this;
    }

    public function getForce(): int
    {
        return $this->force;
    }

    public function setForce(int $force): Personnage
    {
        $this->force = $force;

        return $this;
    }

    public function getEsprit(): int
    {
        return $this->esprit;
    }

    public function setEsprit(int $esprit): Personnage
    {
        $this->esprit = $esprit;

        return $this;
    }

    public function getAgilite(): int
    {
        return $this->agilite;
    }

    public function setAgilite(int $agilite): Personnage
    {
        $this->agilite = $agilite;

        return $this;
    }

    public function getCharisme(): int
    {
        return $this->charisme;
    }

    public function setCharisme(int $charisme): Personnage
    {
        $this->charisme = $charisme;

        return $this;
    }
}
