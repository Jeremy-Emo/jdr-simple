<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PathRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PathRepository::class)]
class Path
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'pathsTo')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Map $toMap = null;

    #[ORM\Column(type: Types::TEXT)]
    private string $infos = '';

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Map $fromMap = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToMap(): ?Map
    {
        return $this->toMap;
    }

    public function setToMap(?Map $toMap): static
    {
        $this->toMap = $toMap;

        return $this;
    }

    public function getInfos(): string
    {
        return $this->infos;
    }

    public function setInfos(string $infos): static
    {
        $this->infos = $infos;

        return $this;
    }

    public function getFromMap(): ?Map
    {
        return $this->fromMap;
    }

    public function setFromMap(?Map $fromMap): static
    {
        $this->fromMap = $fromMap;

        return $this;
    }
}
