<?php

declare(strict_types=1);

namespace App\Dto;

class Personnage
{
    private string $nom;
    private string $job;

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
}
