<?php

declare(strict_types=1);

namespace App\EventSubscriber\Exception;

use App\Exception\ApiException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class CatchApiExceptionSubscriber implements EventSubscriberInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => [
                ['onException', 150]
            ],
        ];
    }

    public function onException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if ($exception instanceof ApiException) {
            $event->setResponse($exception->getJsonResponse());
        }
    }
}