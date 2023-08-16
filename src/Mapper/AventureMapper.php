<?php

declare(strict_types=1);

namespace App\Mapper;

use App\Dto\Aventure as AventureDto;
use App\Dto\Joueur as JoueurDto;
use App\Dto\Personnage as PersonnageDto;
use App\Entity\Aventure;
use App\Entity\Groupe;
use App\Entity\Joueur;
use App\Entity\Personnage;
use App\Exception\AppException;

class AventureMapper
{
    public function map(Aventure $entity): AventureDto
    {
        return (new AventureDto())
            ->setNom($entity->getNom())
            ->setSynopsis($entity->getSynopsis())
            ->setJoueurs($this->mapJoueurs($entity->getGroupe()));
    }

    /**
     * @return JoueurDto[]
     */
    private function mapJoueurs(?Groupe $groupe): array
    {
        if (null === $groupe) {
            return [];
        }

        $joueurs = [];
        foreach ($groupe->getJoueurs() as $joueur) {
            $joueurs[] = $this->mapJoueur($joueur);
        }

        return $joueurs;
    }

    private function mapJoueur(Joueur $entity): JoueurDto
    {
        return (new JoueurDto())
            ->setNom($entity->getNom())
            ->setId((int) $entity->getId())
            ->setPersonnage($this->mapPersonnage($entity->getSelectedPersonnage()))
            ->setMapId($entity->getPosition()?->getId());
    }

    private function mapPersonnage(?Personnage $entity): PersonnageDto
    {
        if (null === $entity) {
            throw new AppException('Le joueur doit avoir un personnage pour faire partie d\'une aventure');
        }

        return (new PersonnageDto())->setJob($entity->getJob())->setNom($entity->getNom());
    }
}
