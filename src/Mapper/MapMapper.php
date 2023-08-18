<?php

declare(strict_types=1);

namespace App\Mapper;

use App\Dto\Joueur as JoueurDto;
use App\Dto\Map as MapDto;
use App\Dto\Path as PathDto;
use App\Dto\Personnage as PersonnageDto;
use App\Entity\Joueur;
use App\Entity\Map;
use App\Entity\Path;
use App\Entity\Personnage;
use App\Exception\AppException;
use App\Repository\PathRepository;
use Doctrine\Common\Collections\Collection;

class MapMapper
{
    public function __construct(private PathRepository $pathRepository)
    {
    }

    public function map(Map $entity): MapDto
    {
        $pathsTo = $this->pathRepository->findBy([
            'fromMap' => $entity,
        ]);

        return (new MapDto())
            ->setNom($entity->getNom())
            ->setId((int) $entity->getId())
            ->setInfos($entity->getInfos())
            ->setJoueurs($this->mapJoueurs($entity->getJoueurs()))
            ->setPaths($this->mapPaths($pathsTo));
    }

    /**
     * @param iterable<Path> $paths
     *
     * @return PathDto[]
     */
    private function mapPaths(iterable $paths): array
    {
        $array = [];

        foreach ($paths as $path) {
            $array[] = $this->mapPath($path);
        }

        return $array;
    }

    private function mapPath(Path $entity): PathDto
    {
        return (new PathDto())
            ->setInfos($entity->getInfos())
            ->setToId((int) $entity->getToMap()?->getId());
    }

    /**
     * @return JoueurDto[]
     */
    private function mapJoueurs(Collection $joueurs): array
    {
        $array = [];

        foreach ($joueurs as $joueur) {
            $array[] = $this->mapJoueur($joueur);
        }

        return $array;
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
