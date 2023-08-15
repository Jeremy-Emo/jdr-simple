<?php

declare(strict_types=1);

namespace App\EventSubscriber\Doctrine;

use App\Entity\AdminUser;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminUserEventSubscriber implements EventSubscriberInterface
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
        ];
    }

    public function prePersist(PrePersistEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof AdminUser && null !== $entity->getPlainPassword() && '' !== $entity->getPlainPassword()) {
            $password = $this->passwordHasher->hashPassword($entity, $entity->getPlainPassword());
            $entity->setPassword($password);
        }
    }
}