<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Path;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Path>
 *
 * @method Path|null find($id, $lockMode = null, $lockVersion = null)
 * @method Path|null findOneBy(array $criteria, array $orderBy = null)
 * @method Path[]    findAll()
 * @method Path[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PathRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Path::class);
    }

    public function save(Path $path, bool $flush = true): void
    {
        $this->_em->persist($path);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
