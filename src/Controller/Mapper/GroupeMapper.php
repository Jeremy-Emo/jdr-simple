<?php

declare(strict_types=1);

namespace App\Controller\Mapper;

use App\Dto\Groupe as GroupeDto;
use App\Entity\Groupe;

class GroupeMapper
{
    public function map(Groupe $entity): GroupeDto
    {
        $joueurIds = [];
        foreach ($entity->getJoueurs() as $joueur) {
            $joueurIds[] = (int) $joueur->getId();
        }

        return (new GroupeDto())
            ->setAventureId((int) $entity->getAventure()?->getId())
            ->setNom($entity->getNom())
            ->setJoueurIds($joueurIds);
    }
}
