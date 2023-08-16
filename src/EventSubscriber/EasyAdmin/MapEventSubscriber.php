<?php

declare(strict_types=1);

namespace App\EventSubscriber\EasyAdmin;

use App\Entity\Map;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
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
}
