<?php

declare(strict_types=1);

namespace App\Dto;

class Path
{
    private string $infos;
    private int $toId;
    private string $mapName;

    public function getInfos(): string
    {
        return $this->infos;
    }

    public function setInfos(string $infos): Path
    {
        $this->infos = $infos;

        return $this;
    }

    public function getToId(): int
    {
        return $this->toId;
    }

    public function setToId(int $toId): Path
    {
        $this->toId = $toId;

        return $this;
    }

    public function getMapName(): string
    {
        return $this->mapName;
    }

    public function setMapName(string $mapName): Path
    {
        $this->mapName = $mapName;

        return $this;
    }
}
