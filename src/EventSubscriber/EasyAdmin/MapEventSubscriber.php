<?php

declare(strict_types=1);

namespace App\EventSubscriber\EasyAdmin;

use App\Entity\Map;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MapEventSubscriber implements EventSubscriberInterface
{
    /**
     * @return array<string, array<int, string>>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => ['onMapPersist'],
            BeforeEntityUpdatedEvent::class => ['onMapUpdate'],
        ];
    }

    public function onMapPersist(BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Map) {
            return;
        }

        foreach ($entity->getPathsTo() as $path) {
            $path->setFromMap($entity);
        }
    }

    public function onMapUpdate(BeforeEntityUpdatedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Map) {
            return;
        }

        foreach ($entity->getPathsTo() as $path) {
            $path->setFromMap($entity);
        }
    }
}
