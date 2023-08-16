<?php

declare(strict_types=1);

namespace App\Renderer;

use Symfony\Component\Serializer\SerializerInterface;

class JsonRenderer
{
    public function __construct(private SerializerInterface $serializer)
    {
    }

    public function render(object $object): string
    {
        return $this->serializer->serialize($object, 'json');
    }

    public function supports(): string
    {
        return 'application/json';
    }
}