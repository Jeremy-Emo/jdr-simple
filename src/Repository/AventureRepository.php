<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Aventure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Aventure>
 *
 * @method Aventure|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aventure|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aventure[]    findAll()
 * @method Aventure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AventureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aventure::class);
    }

    public function save(Aventure $aventure, bool $flush = true): void
    {
        $this->_em->persist($aventure);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
