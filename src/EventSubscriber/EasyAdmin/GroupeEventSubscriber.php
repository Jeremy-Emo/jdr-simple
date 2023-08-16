<?php

declare(strict_types=1);

namespace App\EventSubscriber\EasyAdmin;

use App\Entity\Groupe;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class GroupeEventSubscriber implements EventSubscriberInterface
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => ['onGroupePersist'],
            BeforeEntityUpdatedEvent::class => ['onGroupeUpdated'],
        ];
    }

    public function onGroupePersist(BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Groupe) {
            return;
        }

        foreach ($entity->getJoueurs() as $joueur) {
            $joueur->setPosition($entity->getAventure()?->getStartMap());
        }
    }

    public function onGroupeUpdated(BeforeEntityUpdatedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Groupe) {
            return;
        }

        $originalEntity = $this->em->getUnitOfWork()->getOriginalEntityData($entity);

        if (null !== $entity->getAventure() && $originalEntity['aventure'] !== $entity->getAventure()) {
            foreach ($entity->getJoueurs() as $joueur) {
                $joueur->setPosition($entity->getAventure()->getStartMap());
            }
        }
    }
}
